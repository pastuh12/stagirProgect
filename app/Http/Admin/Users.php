<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Users
 *
 * @property User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Пользователи';


    /**
     * @var string
     */
    protected $alias = 'users';

    public function initialize():void
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o')
            ->setTitle($this->title);
    }

    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::link('id', 'ID пользователя')->setHtmlAttribute('class', 'text-center')
                ->setWidth('100px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::image('avatar', 'Аватар<br/><small>(image)</small>')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs foobar')
                ->setWidth('200px'),

            AdminColumn::link('name', 'Имя')->setHtmlAttribute('class', 'text-center')
                ->setWidth('200px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('name', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('name', $direction);
                }),

            AdminColumn::email('email', 'Email')->setOrderable(function ($query, $direction) {
                $query->orderBy('email', $direction);
            })->setHtmlAttribute('class', 'text-center')
                ->setWidth('200px'),

            AdminColumn::text('role', 'Роль')->setHtmlAttribute('class', 'text-center')
                ->setWidth('150px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('role', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('role', $direction);
                }),
            AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
        ];

        return AdminDisplay::datatables()
            ->setName('usersdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(100)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');
    }


    /**
     * @param int|null $id
     *
     * @return FormInterface
     */
    public function onEdit(int $id = null): FormInterface
    {

        if($id != null){
            $date = AdminFormElement::datetime('updated_at', 'Дата');
        } else {
            $date = AdminFormElement::datetime('created_at', 'Дата');
        }

        $form = AdminForm::form()->setElements([
            AdminFormElement::text('name', 'Имя')->required(),

            AdminFormElement::password('password', 'Пароль')
                ->HashWithBcrypt()
                ->allowEmptyValue(),

            AdminFormElement::text('email', 'Email')->required(),
            $date->setVisible(true)
                ->setReadonly(false)
                ->required(),

            AdminFormElement::image('avatar', 'Фото')
                ->setUploadPath(function(UploadedFile $image) {
                    return 'storage/user/avatar';
                })->setReadonly(true),
//переделать в список со значениями из таблицы
            AdminFormElement::select('role', 'Роли', Role::getRoles())->setDisplay('role'),

            AdminFormElement::checkbox('is_blocked', 'Блокировка'),
        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate(): FormInterface
    {
        return $this->onEdit(null);
    }

    public function isCreatable(): bool
    {
        return (auth()->user()->role === 'admin');
    }

    public function isEditable(Model $model): bool
    {
    return (auth()->user()->role === 'admin');
}

    public function isDeletable(Model $model): bool
    {
        return (auth()->user()->role === 'admin');
    }
}
