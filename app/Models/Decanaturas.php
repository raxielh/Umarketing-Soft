<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Decanaturas
 * @package App\Models
 * @version May 21, 2018, 2:46 am UTC
 *
 * @property char descripcion
 * @property char decano
 * @property integer campus_id
 */
class Decanaturas extends Model
{
    

    public $table = 'decanaturas';
    

    


    public $fillable = [
        'descripcion',
        'decano',
        'campus_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'decano' => 'string',
        'campus_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required',
        'campus_id' => 'required'
    ];

    
}
