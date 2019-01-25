<?php

namespace App\Repositories;

use App\Models\location;
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
class locationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'lat',
        'lang'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return location::class;
    }
}
