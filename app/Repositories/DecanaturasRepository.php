<?php

namespace App\Repositories;

use App\Models\Decanaturas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DecanaturasRepository
 * @package App\Repositories
 * @version May 21, 2018, 2:46 am UTC
 *
 * @method Decanaturas findWithoutFail($id, $columns = ['*'])
 * @method Decanaturas find($id, $columns = ['*'])
 * @method Decanaturas first($columns = ['*'])
*/
class DecanaturasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'decano',
        'campus_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Decanaturas::class;
    }
}
