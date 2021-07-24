<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Model\Country;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Contacts
 *
 * @property \App\Model\Gallery_foto $model
 *
 */
class Gallery_foto extends Section
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

    /**
     * @return DisplayInterface
     */
    public function onDisplay($scopes = [])
    {

        $columns = [

             AdminColumn::image('photo', 'Photo<br/><small>(image)</small>')
                    ->setHtmlAttribute('class', 'hidden-sm hidden-xs foobar')
                    ->setWidth('100px'),

            AdminColumn::link('title', 'Название')
                ->setSearchCallback(function($column, $query, $search){
                    return $query
                        ->orWhere('title', 'like', '%'.$search.'%');
                })
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('title', $direction);
                }),

            AdminColumn::boolean('published', 'Опублековано'),
            AdminColumn::text('created_at', 'Дата создания/изменения', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
        ];

        $display = AdminDisplay::datatables()
            ->setName('Gallerydatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center')
        ;

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Models\Gallery_foto::class, 'title')
                ->setLoadOptionsQueryPreparer(function($element, $query) {
                    return $query;
                })
                ->setDisplay('title')
                ->setColumnName('title')
                ->setPlaceholder('Все названия'),
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }


    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel()->addScript('custom-image', '/customjs/customimage.js', ['admin-default']);

        $form->setItems(
            AdminFormElement::columns()
                ->addColumn(function() {
                    return [
                        AdminFormElement::text('firstName', 'First Name')->required('Please, type first name'),
                        AdminFormElement::text('lastName', 'Last Name')->required(),
                        AdminFormElement::text('phone', 'Phone'),
                        AdminFormElement::text('address', 'Address'),
                    ];
                })->addColumn(function() {
                    return [
                        AdminFormElement::image('photo', 'Photo')->setView(view('admin.custom.image')),
                        AdminFormElement::date('birthday', 'Birthday')->setFormat('d.m.Y'),
                        AdminFormElement::hidden('user_id')->setDefaultValue(auth()->user()->id),
                    ];
                })
        );

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
