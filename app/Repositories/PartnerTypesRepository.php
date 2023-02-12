<?php

namespace App\Repositories;

use App\Models\PartnerTypes;
use App\Repositories\BaseRepository;

/**
 * Class PartnerTypesRepository
 * @package App\Repositories
 * @version February 12, 2023, 8:43 am UTC
*/

class PartnerTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return PartnerTypes::class;
    }
}
