<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use App\Repositories\ClientsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Clients;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;

class ValidationController extends Controller
{
    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<a href="' . route('beforeValidatingValidation', [$row->id, 'Clients']) . '"
                                     class="btn btn-danger btn-sm deleteProduct" title="Validálás"><i class="fas fa-user-edit"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function validating(Request $request, $active, $validated)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('clients as t1')
                    ->join('settlements as t3', 't3.id', '=', 't1.settlement_id')
                    ->select('t1.*', DB::raw('concat(t1.postcode, " ", t3.name, " ", t1.address) as fulladdress'), 't3.name as settlementName')
                    ->whereNull('t1.deleted_at')
                    ->where('t1.active', '=', $active)
                    ->where( 't1.validated', '=', $validated)
                    ->get();
                return $this->dwData($data);

            }

            return view('clients.validating');
        }
    }

}
