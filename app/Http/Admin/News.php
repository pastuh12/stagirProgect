<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
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

    public function initialize(): void
    {
        $this->addToNavigation()->setPriority(200)->setIcon('fa fa-lightbulb-o')->setTitle('Новости');
    }

    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::link('id', 'ID')
                ->setHtmlAttribute('class', 'text-center')
                ->setWidth('50px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::link('title', 'Название')->setHtmlAttribute('class', 'text-center')
                ->setWidth('150px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('title', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('title', $direction);
                }),
            AdminColumn::image('image', 'Фото<br/><small>(image)</small>')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs foobar')
                ->setWidth('150px'),

            AdminColumn::relatedLink('author_id', 'Автор')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('author_id', $direction);
                })
                ->setHtmlAttribute('class', 'text-center')
                ->setWidth('110px'),

            AdminColumn::custom('Описание', function ($instance) {
                return $instance->describe ?: Str::limit($instance->text, 100, '...');
            })->setWidth('200px'),

            AdminColumn::lists('category.title', 'Категории')->setWidth('150px'),

            AdminColumn::custom('Опубликовано', function ($instance) {
                return $instance->is_published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
            })->setWidth('25px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::text('views', 'Просмотры')->setOrderable(function ($query, $direction) {
                $query->orderBy('views', $direction);
            })->setWidth('120px')->setHtmlAttribute('class', 'text-center'),

            AdminColumn::custom('Дата изменения', function ($instance) {
                return Carbon::parse($instance->updated_at)
                    ->diffForHumans();
            })
                ->setWidth('150px')
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false),
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
     * @param int|null $id
     *
     * @return FormInterface
     */
    public function onEdit(int $id = null): FormInterface
    {
        if ($id === null) {
            $date = AdminFormElement::datetime('created_at', 'Дата');
        } else {
            $date = AdminFormElement::datetime('updated_at', 'Дата');
        }

        $form = AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название')
                ->addValidationRule('min:10')
                ->required(),

            AdminFormElement::select('author_id', 'Автор', User::getAuthorsId())
                ->required(),

            AdminFormElement::image('image', 'Фото')
                ->setUploadPath(function (UploadedFile $image) {
                    return 'storage/news/images';
                }),

            AdminFormElement::wysiwyg('describe', 'Краткое описание'),

            AdminFormElement::wysiwyg('text', 'Текст')
                ->addValidationRule('min:500')
                ->required(),

            AdminFormElement::multiselect('category', 'Категории', Category::class)->setDisplay('title'),

            AdminFormElement::checkbox('is_published', 'Опубликовано')
                ->setReadonly(Auth::user()->role !== 'admin'),

            $date
                ->required()
                ->setCurrentDate(),

        ]);

        $form->getButtons()->setButtons([
            'save' => new Save(),
            'save_and_close' => new SaveAndClose(),
            'cancel' => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate(): FormInterface
    {
        return $this->onEdit();
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function isDeletable(Model $model): bool
    {
        return false;
    }
}
