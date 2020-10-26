<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chambre
 * @package App\Models
 * @version August 23, 2020, 7:06 am UTC
 *
 * @property string $code
 * @property integer $etage
 * @property integer $montant_loyer
 * @property string $description
 * @property integer $batiment_id
 */
class Chambre extends Model
{
    use SoftDeletes;

    public $table = 'chambres';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'montant_loyer',
        'description',
        'batiment_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'etage' => 'integer',
        'montant_loyer' => 'integer',
        'description' => 'string',
        'batiment_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'bail|required|max:255|unique:chambres',
        'montant_loyer' => 'bail|required|integer',
        'description' => 'bail|',
        'batiment_id' => 'bail|required|integer'
    ];

    public function locataires(){
        return $this->hasMany(Locataire::class);
    }

    public function reparations(){
        return $this->morphMany('App\Models\Reparation', 'reparable');
    }

    public function batiment(){
        return $this->belongsTo(Batiment::class);
    }

    public function etatChambres(){
        return $this->hasMany(EtatChambre::class);
    }
}
