<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
    ];

    public $timestamps = false;

    /**
     *
     */
    public static function getRoles()
    {
        $items = self::all();
        $roles = array();
        foreach($items as $role){
            $roles[$role->role] = $role->role;
        }
        return $roles;

    }
}
