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
 * @property \App\Models\News $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class News extends Section implements Initializable
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
    protected $title = 'News';

    /**
     * @var string
     */
    protected $alias = 'news';

    /**
     * @return DisplayInterface
     */

    public function initialize()
    {
        $this->addToNavigation()->setPriority(200)->setIcon('fa fa-lightbulb-o')->setTitle('Новости');
    }

        public function onDisplay($payload = [])
        {
            $columns = [
                AdminColumn::link('title', 'Название')->setHtmlAttribute('class', 'text-center')
                    ->setWidth('200px')
                    ->setSearchCallback(function ($column, $query, $search) {
                        return $query
                            ->orWhere('title', 'like', '%' . $search . '%');
                    })
                    ->setOrderable(function ($query, $direction) {
                        $query->orderBy('title', $direction);
                    }),

                AdminColumn::link('author', 'Автор')->setOrderable(function ($query, $direction) {
                    $query->orderBy('author', $direction);
                })->setHtmlAttribute('class', 'text-center'),

               // AdminColumn::lists('categories.title', 'Категории')->setWidth('200px'),

                AdminColumn::custom('Опубликовано', function ($instance) {
                    return $instance->published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('25px')->setHtmlAttribute('class', 'text-center'),

                AdminColumn::text('views', 'Просмотры')->setOrderable(function ($query, $direction) {
                    $query->orderBy('views', $direction);
                })->setWidth('120px')->setHtmlAttribute('class', 'text-center'),

                AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                    ->setWidth('160px')
                    ->setOrderable(function ($query, $direction) {
                        $query->orderBy('updated_at', $direction);
                    })
                    ->setSearchable(false)
                ,
            ];

            $display = AdminDisplay::datatables()
                ->setName('newsdatatables')
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
            AdminFormElement::text('title', 'Название')->required(),
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