<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Gallery_photo;
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
        Gallery_photo::class  => 'App\Http\Admin\Gallery_foto',
        Comment::class => 'App\Http\Admin\Comments',
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
