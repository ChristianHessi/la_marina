<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reparation
 * @package App\Models
 * @version August 23, 2020, 8:47 am UTC
 *
 * @property string $motif
 * @property string $date
 * @property integer $montant
 * @property string $observations
 * @property integer $chambre_id
 */
class Reparation extends Model
{
    use SoftDeletes;

    public $table = 'reparations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'motif',
        'date',
        'montant',
        'observations',
        'chambre_id',
        'technicien',
        'tel_technicien'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'motif' => 'string',
        'date' => 'date',
        'montant' => 'integer',
        'observations' => 'string',
        'chambre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'motif' => 'bail|required',
        'date' => 'bail|required|date',
        'montant' => 'bail|required|integer:unsigned',
        'technicien' => 'bail|required|max:255',
        'tel_technicien' => 'bail|required|min:9',
        'observations' => 'bail|required'
    ];

    
}
