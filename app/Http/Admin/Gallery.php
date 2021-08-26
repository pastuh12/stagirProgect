<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Contacts
 *
 * @property \App\Models\Gallery $model
 *
 */
class Gallery extends Section implements Initializable
{
    /**
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $alias;

    public function getTitle()
    {
        return 'Галерея';
    }

    public function initialize()
    {
        $this->addToNavigation()->setPriority(300)->setIcon('fa fa-lightbulb-o')
            ->setTitle('Галерея');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay($scopes = [])
    {

        $columns = [
            AdminColumn::link('id', 'ID фото')->setHtmlAttribute('class', 'text-center')
                ->setWidth('100px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::link('author_id', 'Автор')->setOrderable(function ($query, $direction) {
                $query->orderBy('author_id', $direction);
            })->setHtmlAttribute('class', 'text-center')->setWidth('100px'),

             AdminColumn::image('image', 'Фото<br/><small>(image)</small>')
                    ->setHtmlAttribute('class', 'hidden-sm hidden-xs foobar')
                    ->setWidth('200px'),

            AdminColumn::link('title', 'Название')
                ->setSearchCallback(function($column, $query, $search){
                    return $query
                        ->orWhere('title', 'like', '%'.$search.'%');
                })
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('title', $direction);
                }),

            AdminColumn::lists('category.title', 'Категории')->setWidth('150px'),

            AdminColumn::custom('Опубликовано', function ($instance) {
                return $instance->is_published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
            })->setWidth('25px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::custom('Рейтинг', function(\App\Models\Gallery $gallery) {
                return $gallery->getRating();
            })->setHtmlAttribute('class', 'text-center'),

            AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false),

        ];

        $display = AdminDisplay::datatables()
            ->setName('gallerydatatables')
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
    public function onEdit($id = null)
    {

        $form = AdminForm::panel()->addScript('custom-image', '/    js/customimage.js', ['admin-default']);

        $form->setItems(
            AdminFormElement::columns()
                ->addColumn(function () {
                    return [
                        AdminFormElement::text('title', 'Название')->required(),
                        AdminFormElement::select('author_id', 'Автор', User::getAuthorsId())->required(),
                        AdminFormElement::multiselect('category', 'Категории', Category::class)->setDisplay('title')

                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::image('image', 'Фото')
                            ->setUploadPath(function(\Illuminate\Http\UploadedFile $image) {
                                return 'storage/gallery/images';
                            }),
                        AdminFormElement::datetime('updated_at', 'Дата')->required(),

                        AdminFormElement::checkbox('is_published', 'Опубликовано')
                            ->setReadonly(Auth::user()->role !== 'admin'),

                    ];
                }),
        );

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
        return true;
    }

    public function isDeletable(Model $model): bool
    {
        return (auth()->user()->role === 'admin');
    }
}
