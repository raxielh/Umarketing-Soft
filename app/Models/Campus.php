<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Campus
 * @package App\Models
 * @version May 21, 2018, 2:21 am UTC
 *
 * @property char descripcion
 */
class Campus extends Model
{
    

    public $table = 'campuses';
    

    


    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required'
    ];

    
}
