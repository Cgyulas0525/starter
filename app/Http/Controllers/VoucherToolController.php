<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VoucherToolController extends Controller
{
    /**
     * Active vouchers this day
     *
     * @return \Illuminate\Support\Collection
     */
    public static function validVouchers() {
        return DB::table('vouchers as t1')
            ->join('vouchertypes as t2', 't2.id', '=', 't1.vouchertype_id')
            ->where('t1.active', 1)
            ->where('t1.validityfrom', '<=', date('Y-m-d', strtotime(now())))
            ->where(function ($query) {
                $query->where('t1.validityto', '>=', date('Y-m-d', strtotime(now())))
                    ->orWhereNull('t1.validityto');
            })
            ->whereNull('t1.deleted_at')
            ->get();
    }

    /**
     * Active vouchers between $from and $to
     *
     * @param $from
     * @param null $to
     * @return \Illuminate\Support\Collection
     */
    public static function validVouchersTimeInterval($from, $to = null) {
        return DB::table('vouchers as t1')
            ->join('vouchertypes as t2', 't2.id', '=', 't1.vouchertype_id')
            ->where('t1.active', 1)
            ->where('t1.validityfrom', '<=', $from)
            ->where(function ($query) use ($to) {
                if (is_null($to)) {
                    $query->where('t1.validityto', '>=', date('Y-m-d', strtotime(now())))
                        ->orWhereNull('t1.validityto');
                } else {
                    $query->where('t1.validityto', '>=', $to);
                }
            })
            ->whereNull('t1.deleted_at')
            ->get();
    }

}
