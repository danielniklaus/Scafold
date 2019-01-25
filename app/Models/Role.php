<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use SoftDeletes;

    public $table = 'roles';
    

    // protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'guard_name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'guard_name' => 'required'
    ];


    //
}
