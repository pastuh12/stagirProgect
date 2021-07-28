<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
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
        $this->addToNavigation()->setPriority(300)->setIcon('fa fa-lightbulb-o')->setTitle('Галерея');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay($scopes = [])
    {

        $columns = [

             AdminColumn::image('image', 'Photo<br/><small>(image)</small>')
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
            AdminColumn::lists('category.title', 'Категории')->setWidth('200px'),
            AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
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
                        AdminFormElement::multiselect('category', 'Категории', Category::class)->setDisplay('title'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::image('image', 'Фото'),
                        AdminFormElement::datetime('updated_at', 'Дата'),
                    ];
                })
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

    public function isDeletable(Model $model)
    {
        return true;
    }
}
