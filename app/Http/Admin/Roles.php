<?php


namespace App\Http\Admin;

    use AdminColumn;
    use AdminDisplay;
    use AdminDisplayFilter;
    use AdminForm;
    use AdminFormElement;
    use App\Models\Role;
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
     * Class Roles
     * @package App\Http\Admin
     */
class Roles extends Section implements Initializable
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
    protected $title = 'Role';

    /**
     * @var string
     */
    protected $alias = 'role';

    /**
     * @return DisplayInterface
     */

    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o')->setTitle('Роли');
    }

    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::text('id', 'ID роли')->setHtmlAttribute('class', 'text-center')
                ->setWidth('100px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('id', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('id', $direction);
                }),

            AdminColumn::text('role', 'Роль')->setHtmlAttribute('class', 'text-center')
                ->setWidth('150px')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('role', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('role', $direction);
                }),

        ];

        $display = AdminDisplay::datatables()
            ->setName('rolesdatatables')
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
            AdminFormElement::text('role', 'Роль')->required(),

        ]);

        $form->getButtons()->setButtons([
            'save' => new Save(),
            'save_and_close' => new SaveAndClose(),
            'save_and_create' => new SaveAndCreate(),
            'cancel' => (new Cancel()),
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

