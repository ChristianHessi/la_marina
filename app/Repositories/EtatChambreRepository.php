<?php
/**
 * Created by PhpStorm.
 * User: ChristianKevineHESSI
 * Date: 15/10/2020
 * Time: 15:18
 */

namespace App\Repositories;


use App\Models\EtatChambre;

class EtatChambreRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'type',
        'chambre_id',
        'locataire_id',
        'description',
        'date'
    ];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        // TODO: Implement model() method.
        return EtatChambre::class;
    }
}