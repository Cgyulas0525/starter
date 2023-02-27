<?php

namespace App\Repositories;

use App\Models\Clientvouchers;
use App\Repositories\BaseRepository;

/**
 * Class ClientvouchersRepository
 * @package App\Repositories
 * @version February 24, 2023, 6:51 am UTC
*/

class ClientvouchersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'voucher_id',
        'posted',
        'used',
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
        return Clientvouchers::class;
    }
}
