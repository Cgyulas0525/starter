<?php

namespace App\Repositories;

use App\Models\Lotteries;
use App\Repositories\BaseRepository;

/**
 * Class LotteriesRepository
 * @package App\Repositories
 * @version February 21, 2023, 11:17 am UTC
*/

class LotteriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'lotteriedate',
        'content',
        'description',
        'active'
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
        return Lotteries::class;
    }
}
