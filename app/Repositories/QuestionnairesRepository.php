<?php

namespace App\Repositories;

use App\Models\Questionnaires;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnairesRepository
 * @package App\Repositories
 * @version February 21, 2023, 10:20 am UTC
*/

class QuestionnairesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'validityfrom',
        'validityto',
        'active',
        'basicpackage',
        'qrcode',
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
        return Questionnaires::class;
    }
}
