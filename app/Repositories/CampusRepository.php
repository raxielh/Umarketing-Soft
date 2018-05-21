<?php

namespace App\Repositories;

use App\Models\Campus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CampusRepository
 * @package App\Repositories
 * @version May 21, 2018, 2:21 am UTC
 *
 * @method Campus findWithoutFail($id, $columns = ['*'])
 * @method Campus find($id, $columns = ['*'])
 * @method Campus first($columns = ['*'])
*/
class CampusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Campus::class;
    }
}
