<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
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
 * Class News4
 *
 * @property \App\Models\Comment $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Comments extends Section implements Initializable
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
    protected $title = 'Comment';

    /**
     * @var string
     */
    protected $alias = 'Comment';

    /**
     * @return DisplayInterface
     */

    public function initialize()
    {
        $this->addToNavigation()->setPriority(400)->setIcon('fa fa-lightbulb-o')->setTitle('Комментарии');
    }

    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::link('id', 'ID комментария')->setHtmlAttribute('class', 'text-center')
                ->setWidth('200px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::link('new_id', 'ID новости')->setOrderable(function ($query, $direction) {
                $query->orderBy('new_id', $direction);
            })->setHtmlAttribute('class', 'text-center')->setLinkAttributes(['target' => '../new_id/edit']),

            AdminColumn::text('author', 'Автор')->setOrderable(function ($query, $direction) {
                $query->orderBy('author', $direction);
            })->setWidth('120px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::text('text', 'Текст')->setWidth('250px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::custom('Опубликовано', function ($instance) {
                return $instance->published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
            })->setWidth('25px')->setHtmlAttribute('class', 'text-center'),


            AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
        ];

        $display = AdminDisplay::datatables()
            ->setName('commentsdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');

        return $display;
    }


    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id = null): FormInterface
    {
        if($id != null){
            $date = AdminFormElement::datetime('updated_at', 'Дата');
        } else {
            $date = AdminFormElement::datetime('created_at', 'Дата');
        }
        $form = AdminForm::form()->setElements([
            AdminFormElement::number('id', 'ID')->setVisible(true)->setReadonly(true),
            AdminFormElement::number('new_id', 'ID новости')->required(),
            AdminFormElement::text('author', 'Автор')->required(),
            AdminFormElement::wysiwyg('text', 'Текст')->required(),
            $date
                ->setVisible(true)
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
