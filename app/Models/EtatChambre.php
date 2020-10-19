<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtatChambre extends Model
{
    protected $fillable = [
        'type',
        'chambre_id',
        'locataire_id',
        'description',
        'date'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }

    public function locataire(){
        return $this->belongsTo(Locataire::class);
    }
}
