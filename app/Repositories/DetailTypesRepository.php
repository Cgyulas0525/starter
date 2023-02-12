<?php

namespace App\Repositories;

use App\Models\DetailTypes;
use App\Repositories\BaseRepository;

/**
 * Class DetailTypesRepository
 * @package App\Repositories
 * @version February 12, 2023, 8:44 am UTC
*/

class DetailTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'listing',
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
        return DetailTypes::class;
    }
}
