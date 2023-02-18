<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;

use App\Models\Validpostcodes;

class ClientToolsController extends Controller
{
    public static function localCheck($postcode) {
        return Validpostcodes::where('postcode', $postcode)->where('active', 1)->get()->count();
    }
}
