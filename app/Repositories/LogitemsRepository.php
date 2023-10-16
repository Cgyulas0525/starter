<?php

namespace App\Repositories;

use App\Models\Logitems;
use App\Repositories\BaseRepository;

/**
 * Class LogitemsRepository
 * @package App\Repositories
 * @version February 14, 2023, 6:25 am UTC
*/

class LogitemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'logitemtype_id',
        'client_id',
        'user_id',
        'partnercontact_id',
        'datatable',
        'record',
        'before',
        'after',
        'eventdatetime',
        'remoteaddress'
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
        return Logitems::class;
    }
}
