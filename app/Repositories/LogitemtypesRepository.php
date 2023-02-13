<?php

namespace App\Repositories;

use App\Models\Logitemtypes;
use App\Repositories\BaseRepository;

/**
 * Class LogitemtypesRepository
 * @package App\Repositories
 * @version February 14, 2023, 6:09 am UTC
*/

class LogitemtypesRepository extends BaseRepository
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
        return Logitemtypes::class;
    }
}
