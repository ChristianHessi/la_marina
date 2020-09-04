<?php

namespace App\Repositories;

use App\Models\Chambre;
use App\Repositories\BaseRepository;

/**
 * Class ChambreRepository
 * @package App\Repositories
 * @version August 23, 2020, 7:06 am UTC
*/

class ChambreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'etage',
        'montant_loyer',
        'description',
        'batiment_id'
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
        return Chambre::class;
    }
}
