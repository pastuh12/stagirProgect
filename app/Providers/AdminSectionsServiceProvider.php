<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Role;
use App\Models\User;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        User::class => 'App\Http\Admin\Users',
        News::class => 'App\Http\Admin\News',
        Gallery::class  => 'App\Http\Admin\Gallery',
        Comment::class => 'App\Http\Admin\Comments',
        Category::class => 'App\Http\Admin\Category',
        Role::class => 'App\Http\Admin\Roles',
    ];

    /**
     * Register sections.
     *
     * @param Admin $admin
     * @return void
     */
    public function boot(Admin $admin)
    {

        parent::boot($admin);
    }
}
