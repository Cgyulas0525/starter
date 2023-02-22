<?php

namespace App\Repositories;

use App\Models\Questionnairedetails;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnairedetailsRepository
 * @package App\Repositories
 * @version February 22, 2023, 8:53 am UTC
*/

class QuestionnairedetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionnaire_id',
        'name',
        'detailtype_id',
        'required',
        'readonly',
        'long',
        'rowcount',
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
        return Questionnairedetails::class;
    }
}
