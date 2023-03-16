<?php

namespace App\Repositories;

use App\Models\Clientquestionnariedetails;
use App\Repositories\BaseRepository;

/**
 * Class ClientquestionnariedetailsRepository
 * @package App\Repositories
 * @version March 16, 2023, 8:58 am UTC
*/

class ClientquestionnariedetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clientquestionnarie_id',
        'questionnariedetail_id',
        'reply',
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
        return Clientquestionnariedetails::class;
    }
}
