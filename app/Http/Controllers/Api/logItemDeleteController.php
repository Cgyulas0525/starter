<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Api\logItemDeleteClass;

class logItemDeleteController extends Controller
{
    public function loginItemDelete() {
        $td = new logItemDeleteClass();
        $td->deleteLogin();
    }

    public function logAllDelete() {
        $td = new logItemDeleteClass();
        $td->deleteAllLog();
    }

}
