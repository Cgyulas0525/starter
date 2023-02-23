<?php

namespace App\Repositories;

use App\Models\Questionnairedetailitems;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnairedetailitemsRepository
 * @package App\Repositories
 * @version February 23, 2023, 9:30 am UTC
*/

class QuestionnairedetailitemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionnariedetail_id',
        'value'
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
        return Questionnairedetailitems::class;
    }
}
