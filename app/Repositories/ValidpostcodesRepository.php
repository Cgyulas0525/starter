<?php

namespace App\Repositories;

use App\Models\Validpostcodes;
use App\Repositories\BaseRepository;

/**
 * Class ValidpostcodesRepository
 * @package App\Repositories
 * @version February 13, 2023, 9:58 am UTC
*/

class ValidpostcodesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'settlement_id',
        'postcode',
        'active',
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
        return Validpostcodes::class;
    }
}
