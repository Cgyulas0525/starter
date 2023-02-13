<?php

namespace App\Http\Controllers;

use App\Models\Settlements;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Validpostcodes;
use Response;
use DB;

class MyApiController extends Controller
{
    public static function insertValidPostcodesRecord(Request $request) {
        $s = Settlements::where('name', $request->get('settlement'))->first();
        foreach (Settlements::where('name', $request->get('settlement'))->get() as $settlemen) {
            $validpostcodes = new Validpostcodes();
            $validpostcodes->settlement_id = $s->id;
            $validpostcodes->postcode = $settlemen->postcode;
            $validpostcodes->active = 1;
            $validpostcodes->created_at = Carbon::now();
            $validpostcodes->save();
        }
    }
}
