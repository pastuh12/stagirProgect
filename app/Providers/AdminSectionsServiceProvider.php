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
use App\Http\Admin\Roles;
use App\Http\Admin\Comments;
use App\Http\Admin\Users;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        User::class => Users::class,
        News::class => \App\Http\Admin\News::class,
        Gallery::class  => \App\Http\Admin\Gallery::class,
        Comment::class => Comments::class,
        Category::class => \App\Http\Admin\Category::class,
        Role::class => Roles::class,
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
