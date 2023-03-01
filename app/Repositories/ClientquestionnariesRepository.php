<?php

namespace App\Repositories;

use App\Models\Clientquestionnaries;
use App\Repositories\BaseRepository;

/**
 * Class ClientquestionnariesRepository
 * @package App\Repositories
 * @version March 1, 2023, 8:43 am UTC
*/

class ClientquestionnariesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'questionnarie_id',
        'posted',
        'retrieved',
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
        return Clientquestionnaries::class;
    }
}
