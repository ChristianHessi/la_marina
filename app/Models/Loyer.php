<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Loyer
 * @package App\Models
 * @version August 23, 2020, 8:01 am UTC
 *
 * @property integer $montant
 * @property string $date_versement
 * @property string $debut
 * @property string $fin
 * @property integer $locataire_id
 */
class Loyer extends Model
{
    use SoftDeletes;

    public $table = 'loyers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'montant',
        'date_versement',
        'debut',
        'fin',
        'locataire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'montant' => 'integer',
        'date_versement' => 'date',
        'debut' => 'date',
        'fin' => 'date',
        'locataire_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'montant' => 'bail|required|integer',
        'date_versement' => 'bail:required|date',
        'debut' => 'bail:required|date',
        'fin' => 'bail|required|date',
    ];

    
}
