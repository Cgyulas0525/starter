<?php

namespace App\Repositories;

use App\Models\Clientvoucherused;
use App\Repositories\BaseRepository;

/**
 * Class ClientvoucherusedRepository
 * @package App\Repositories
 * @version March 14, 2023, 4:17 pm UTC
*/

class ClientvoucherusedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clientvoucher_id',
        'usedtime'
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
        return Clientvoucherused::class;
    }
}
