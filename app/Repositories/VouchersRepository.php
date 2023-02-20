<?php

namespace App\Repositories;

use App\Models\Vouchers;
use App\Repositories\BaseRepository;

/**
 * Class VouchersRepository
 * @package App\Repositories
 * @version February 20, 2023, 2:16 pm UTC
*/

class VouchersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'vouchertype_id',
        'partner_id',
        'content',
        'validityfrom',
        'validityto',
        'qrcode',
        'discount',
        'discountpercent',
        'usednumber',
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
        return Vouchers::class;
    }
}
