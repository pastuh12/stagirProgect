<?php

namespace App\Providers;

use App\Models\Gallery_foto;
use App\Models\News;
use App\Models\User;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
   // \App\Role::class => 'App\Http\Admin\Roles',
        User::class => 'App\Http\Admin\Users',
        News::class => 'App\Http\Admin\News',
        Gallery_foto::class  => 'App\Http\Admin\Gallery_foto',
    ];

    /**
     * Register sections.
     *
     * @param Admin $admin
     * @return void
     */
    public function boot(Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
