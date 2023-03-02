<?php

namespace App\Repositories;

use App\Models\Partnerquestionnaries;
use App\Repositories\BaseRepository;

/**
 * Class PartnerquestionnariesRepository
 * @package App\Repositories
 * @version March 2, 2023, 3:41 pm UTC
*/

class PartnerquestionnariesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'partner_id',
        'questionnarie_id',
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
        return Partnerquestionnaries::class;
    }
}
