<?php

namespace App\Repositories;

use App\Models\Partners;
use App\Repositories\BaseRepository;

/**
 * Class PartnersRepository
 * @package App\Repositories
 * @version February 13, 2023, 4:53 pm UTC
*/

class PartnersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'partnertype_id',
        'taxnumber',
        'bankaccount',
        'postcode',
        'settlement_id',
        'address',
        'email',
        'phonenumber',
        'description',
        'active',
        'logourl'
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
        return Partners::class;
    }
}
