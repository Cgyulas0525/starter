<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version February 16, 2023, 3:05 pm UTC
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phonenumber',
        'birthday',
        'password',
        'postcode',
        'settlement_id',
        'address',
        'addresscardnumber',
        'addresscardurl',
        'validated',
        'active',
        'local',
        'description',
        'gender',
        'facebookid',
        'facebookname',
        'facebookemail',
        'gmailid',
        'gmailname',
        'gmailemail'
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
        return Clients::class;
    }
}
