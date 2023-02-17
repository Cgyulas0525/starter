<?php

namespace App\Repositories;

use App\Models\Vouchertypes;
use App\Repositories\BaseRepository;

/**
 * Class VouchertypesRepository
 * @package App\Repositories
 * @version February 16, 2023, 10:06 am UTC
*/

class VouchertypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'local',
        'localfund',
        'localreplay',
        'otherfund',
        'otherreplay',
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
        return Vouchertypes::class;
    }
}
