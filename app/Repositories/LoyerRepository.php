<?php

namespace App\Repositories;

use App\Models\Loyer;
use App\Repositories\BaseRepository;

/**
 * Class LoyerRepository
 * @package App\Repositories
 * @version August 23, 2020, 8:01 am UTC
*/

class LoyerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'montant',
        'date_versement',
        'debut',
        'fin',
        'locataire_id'
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
        return Loyer::class;
    }
}
