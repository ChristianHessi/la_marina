<?php

namespace App\Models;

use App\Repositories\LoyerRepository;
//use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Locataire
 * @package App\Models
 * @version August 23, 2020, 7:31 am UTC
 *
 * @property string $nom
 * @property string $tel
 * @property string $email
 * @property string $date_entree
 * @property boolean $actif
 * @property integer $chambre_id
 */
class Locataire extends Model
{
    use SoftDeletes;

    public $table = 'locataires';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'tel',
        'email',
        'date_entree',
        'date_fin',
        'actif',
        'chambre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'tel' => 'string',
        'email' => 'string',
        'date_entree' => 'date',
        'date_fin' => 'date',
        'actif' => 'boolean',
        'chambre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'bail|required|max:255',
        'tel' => 'bail|required|min:9|max:14',
        'email' => 'bail|email',
        'date_entree' => 'bail|date|required',
        'actif' => 'bail|required|boolean',
        'chambre_id' => 'bail|integer|required'
    ];

    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }

    public function loyers(){
        return $this->hasMany(Loyer::class);
    }

    public function etatChambres(){
        return $this->hasMany(EtatChambre::class);
    }
}
