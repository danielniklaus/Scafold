<?php

namespace App\Repositories;

use App\Models\tempat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tempatRepository
 * @package App\Repositories
 * @version September 3, 2018, 1:16 am UTC
 *
 * @method tempat findWithoutFail($id, $columns = ['*'])
 * @method tempat find($id, $columns = ['*'])
 * @method tempat first($columns = ['*'])
*/
class tempatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_tempat',
        'alamat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tempat::class;
    }
}
