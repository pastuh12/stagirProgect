<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;
use App\Models\News;
use App\Models\Gallery;

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
                ->setWidth('100px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::link('entity_id', 'ID публикации')->setOrderable(function ($query, $direction) {
                $query->orderBy('entity_id', $direction);
            })->setHtmlAttribute('class', 'text-center')->setLinkAttributes(['target' => '../new_id/edit']),

            AdminColumn::custom('Тип публикации', function($instance){
                 if($instance->entity_class === News::class) {
                     $class = 'Новость';
                 }
                    else {
                        $class = 'Фото из галереи';
                    }
                 return $class;
            })
                ->setOrderable(function ($query, $direction) {
                $query->orderBy('entity_class', $direction);
            })
                ->setHtmlAttribute('class', 'text-center')
//                ->setLinkAttributes(['target' => '../new_id/edit'])
            ,

            AdminColumn::text('author_id', 'Автор')->setOrderable(function ($query, $direction) {
                $query->orderBy('author_id', $direction);
            })->setWidth('120px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::custom('Текст', function($instance){
                return Str::limit($instance->text, 50, '...');})
                ->setWidth('250px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::custom('Опубликовано', function ($instance) {
                return $instance->is_published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
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
            AdminFormElement::number('entity_id', 'ID публикации')->required(),
            AdminFormElement::select('entity_class', 'Тип публикации',
                [News::class => 'Новость', Gallery::class => 'Фото для галереи']),
            AdminFormElement::text('author_id', 'Автор')->required(),
            AdminFormElement::wysiwyg('text', 'Текст')->required(),
            $date->setVisible(true)
                 ->setReadonly(false)
                 ->required(),
            AdminFormElement::checkbox('is_published', 'Опубликовано')
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
