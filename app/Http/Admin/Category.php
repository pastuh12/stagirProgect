<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
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
 * @property \App\Models\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Category extends Section implements Initializable
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
    protected $title = 'Category';

    /**
     * @var string
     */
    protected $alias = 'category';

    public function initialize()
    {
        $this->addToNavigation()->setPriority(500)->setIcon('fa fa-lightbulb-o')->setTitle('Категории');
    }

    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::link('id', 'ID категории')->setHtmlAttribute('class', 'text-center')
                ->setWidth('200px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::link('title', 'Название')->setHtmlAttribute('class', 'text-center')
                ->setWidth('200px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('title', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('title', $direction);
                }),

            AdminColumn::custom('Опубликовано', function ($instance) {
                return $instance->is_published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
            })->setWidth('25px')->setHtmlAttribute('class', 'text-center'),
        ];

        $display = AdminDisplay::datatables()
            ->setName('categorydatatables')
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
        $form = AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название')->required(),

            AdminFormElement::select('parent', 'Родительская категория', \App\Models\Category::class)->setDisplay('title'),

            AdminFormElement::checkbox('is_published', 'Опубликовано'),
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
