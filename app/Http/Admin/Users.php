<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
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

    /**
     * @return DisplayInterface
     */

    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o')
            ->setTitle('Пользователи');
    }

    public function onDisplay($payload = [])
    {
        $columns = [
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
            })->setHtmlAttribute('class', 'text-center'),

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
            ->paginate(25)
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
            $password = AdminFormElement::password('password', 'Пароль')
                ->required()
                ->addValidationRule('min:6')
                ->HashWithBcrypt();

            } else {
            $password = AdminFormElement::password('password', 'Пароль')->setVisible(false)
                ->setReadonly(true);
        }

        if($id != null){
            $date = AdminFormElement::datetime('updated_at', 'Дата');
        } else {
            $date = AdminFormElement::datetime('created_at', 'Дата');
        }

        $form = AdminForm::form()->setElements([
            AdminFormElement::text('name', 'Имя')->required(),
            $password,
            AdminFormElement::text('email', 'Email')->required(),
            $date->setVisible(true)
                ->setReadonly(false)
                ->required(),
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
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function isDeletable(Model $model)
    {
        return true;
    }
}
