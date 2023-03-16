<?php

namespace App\Classes\Models;

use App\Models\Vouchers;

class Voucher
{
    private $id = NULL;
    public $voucher = NULL;

    public function __construct($id) {
        $this->id = $id;
        $this->voucher = Vouchers::find($id);
    }

    public function getVoucherId() {
        return $this->voucher->id;
    }

    public function getVoucherName() {
        return $this->voucher->name;
    }

}
