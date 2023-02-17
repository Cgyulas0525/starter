<?php

namespace App\Repositories;

use App\Models\Partnercontacts;
use App\Repositories\BaseRepository;

/**
 * Class PartnercontactsRepository
 * @package App\Repositories
 * @version February 15, 2023, 2:53 pm UTC
*/

class PartnercontactsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'partner_id',
        'name',
        'password',
        'email',
        'phonenumber',
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
        return Partnercontacts::class;
    }
}
