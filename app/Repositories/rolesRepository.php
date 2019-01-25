<?php

namespace App\Repositories;

use App\Models\Role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class locationRepository
 * @package App\Repositories
 * @version September 3, 2018, 4:04 pm UTC
 *
 * @method location findWithoutFail($id, $columns = ['*'])
 * @method location find($id, $columns = ['*'])
 * @method location first($columns = ['*'])
*/
class rolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
