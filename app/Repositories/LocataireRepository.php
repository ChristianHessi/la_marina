<?php

namespace App\Repositories;

use App\Models\Locataire;
use App\Repositories\BaseRepository;

/**
 * Class LocataireRepository
 * @package App\Repositories
 * @version August 23, 2020, 7:31 am UTC
*/

class LocataireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'tel',
        'email',
        'date_entree',
        'actif',
        'chambre_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Locataire::class;
    }
}
