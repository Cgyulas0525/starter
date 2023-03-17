<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use DataTables;
use Auth;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        return view('admin.admin');
    }
    //
}
