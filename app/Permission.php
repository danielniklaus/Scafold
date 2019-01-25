<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public static function defaultPermissions()
    {
        dd('sini');
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',
        ];
    }
    //
}
