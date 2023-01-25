<?php

namespace App\Repositories;

use App\Models\Usertypes;
use App\Repositories\BaseRepository;

/**
 * Class UsertypesRepository
 * @package App\Repositories
 * @version January 25, 2023, 9:23 am UTC
*/

class UsertypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'commit'
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
        return Usertypes::class;
    }
}
