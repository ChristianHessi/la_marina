<?php

namespace App\Repositories;

use App\Models\Reparation;
use App\Repositories\BaseRepository;

/**
 * Class ReparationRepository
 * @package App\Repositories
 * @version August 23, 2020, 8:47 am UTC
*/

class ReparationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'motif',
        'date',
        'montant',
        'observations',
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
        return Reparation::class;
    }
}
