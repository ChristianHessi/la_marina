<?php

namespace App\Models;

use App\Repositories\ChambreRepository;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Batiment
 * @package App\Models
 * @version August 23, 2020, 6:55 am UTC
 *
 * @property string $nom
 * @property string $adresse
 * @property string $description
 */
class Batiment extends Model
{
    use SoftDeletes;

    public $table = 'batiments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'adresse',
        'description',
        'proprietaire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'adresse' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'bail|required|max:250',
        'adresse' => 'bail|required',
        'proprietaire_id' => 'bail|required|integer:unsigned'
    ];

    public function chambres(){
        return $this->hasMany(Chambre::class);
    }

    public function reparations(){
        return $this->morphMany('App\Models\Reparation', 'reparable');
    }

    public function loyers(){
        return $this->hasManyThrough(Loyer::class, Chambre::class);
    }
    
}
