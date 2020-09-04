<?php

namespace App\Repositories;

use App\Models\Batiment;
use App\Repositories\BaseRepository;

/**
 * Class BatimentRepository
 * @package App\Repositories
 * @version August 23, 2020, 6:55 am UTC
*/

class BatimentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'adresse',
        'description'
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
        return Batiment::class;
    }
}
