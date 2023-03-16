<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientquestionnariedetailsRequest;
use App\Http\Requests\UpdateClientquestionnariedetailsRequest;
use App\Repositories\ClientquestionnariedetailsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Clientquestionnariedetails;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class ClientquestionnariedetailsController extends AppBaseController
{
    /** @var ClientquestionnariedetailsRepository $clientquestionnariedetailsRepository*/
    private $clientquestionnariedetailsRepository;
    private $logitem;

    public function __construct(ClientquestionnariedetailsRepository $clientquestionnariedetailsRepo)
    {
        $this->clientquestionnariedetailsRepository = $clientquestionnariedetailsRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
//            ->addColumn('action', function($row){
//                $btn = '<a href="' . route('clientquestionnariedetails.edit', [$row->id]) . '"
//                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
//                $btn = $btn.'<a href="' . route('beforeDestroys', ['Clientquestionnariedetails', $row["id"], 'clientquestionnariedetails']) . '"
//                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
//                return $btn;
//            })
//            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Clientquestionnariedetails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->clientquestionnariedetailsRepository->all();
                return $this->dwData($data);

            }

            return view('clientquestionnariedetails.index');
        }
    }

    /**
     * Display a listing of the Clientquestionnariedetails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function cqdIndex(Request $request, $id)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('clientquestionnariedetails as t1')
                          ->join('questionnairedetails as t2', 't2.id', '=', 't1.questionnariedetail_id')
                          ->select('t1.*', 't2.name as qdName')
                          ->where('t1.clientquestionnarie_id', $id)
                          ->whereNull('t1.deleted_at')
                          ->get();
                return $this->dwData($data);

            }

            return view('clientquestionnariedetails.index');
        }
    }

    /**
     * Show the form for creating a new Clientquestionnariedetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientquestionnariedetails.create');
    }

    /**
     * Store a newly created Clientquestionnariedetails in storage.
     *
     * @param CreateClientquestionnariedetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateClientquestionnariedetailsRequest $request)
    {
        $input = $request->all();

        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->create($input);
        $this->logitem->iudRecord(3, $clientquestionnariedetails->getTable(), $clientquestionnariedetails->id);

        return redirect(route('clientquestionnariedetails.index'));
    }

    /**
     * Display the specified Clientquestionnariedetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->find($id);

        if (empty($clientquestionnariedetails)) {
            return redirect(route('clientquestionnariedetails.index'));
        }

        return view('clientquestionnariedetails.show')->with('clientquestionnariedetails', $clientquestionnariedetails);
    }

    /**
     * Show the form for editing the specified Clientquestionnariedetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->find($id);

        if (empty($clientquestionnariedetails)) {
            return redirect(route('clientquestionnariedetails.index'));
        }

        return view('clientquestionnariedetails.edit')->with('clientquestionnariedetails', $clientquestionnariedetails);
    }

    /**
     * Update the specified Clientquestionnariedetails in storage.
     *
     * @param int $id
     * @param UpdateClientquestionnariedetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientquestionnariedetailsRequest $request)
    {
        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->find($id);

        if (empty($clientquestionnariedetails)) {
            return redirect(route('clientquestionnariedetails.index'));
        }

        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $clientquestionnariedetails->getTable(), $clientquestionnariedetails->id);

        return redirect(route('clientquestionnariedetails.index'));
    }

    /**
     * Remove the specified Clientquestionnariedetails from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientquestionnariedetails = $this->clientquestionnariedetailsRepository->find($id);

        if (empty($clientquestionnariedetails)) {
            return redirect(route('clientquestionnariedetails.index'));
        }

        $this->clientquestionnariedetailsRepository->delete($id);
        $this->logitem->iudRecord(5, $clientquestionnariedetails->getTable(), $clientquestionnariedetails->id);

        return redirect(route('clientquestionnariedetails.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + clientquestionnariedetails::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



