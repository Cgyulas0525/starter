<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientvoucherusedRequest;
use App\Http\Requests\UpdateClientvoucherusedRequest;
use App\Repositories\ClientvoucherusedRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Clientvoucherused;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class ClientvoucherusedController extends AppBaseController
{
    /** @var ClientvoucherusedRepository $clientvoucherusedRepository*/
    private $clientvoucherusedRepository;
    private $logitem;

    public function __construct(ClientvoucherusedRepository $clientvoucherusedRepo)
    {
        $this->clientvoucherusedRepository = $clientvoucherusedRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('clientvoucheruseds.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Clientvoucherused', $row["id"], 'clientvoucheruseds']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Clientvoucherused.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->clientvoucherusedRepository->all();
                return $this->dwData($data);

            }

            return view('clientvoucheruseds.index');
        }
    }

    /**
     * Show the form for creating a new Clientvoucherused.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientvoucheruseds.create');
    }

    /**
     * Store a newly created Clientvoucherused in storage.
     *
     * @param CreateClientvoucherusedRequest $request
     *
     * @return Response
     */
    public function store(CreateClientvoucherusedRequest $request)
    {
        $input = $request->all();

        $clientvoucherused = $this->clientvoucherusedRepository->create($input);
        $this->logitem->iudRecord(3, $clientvoucherused->getTable(), $clientvoucherused->id);

        return redirect(route('clientvoucheruseds.index'));
    }

    /**
     * Display the specified Clientvoucherused.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientvoucherused = $this->clientvoucherusedRepository->find($id);

        if (empty($clientvoucherused)) {
            return redirect(route('clientvoucheruseds.index'));
        }

        return view('clientvoucheruseds.show')->with('clientvoucherused', $clientvoucherused);
    }

    /**
     * Show the form for editing the specified Clientvoucherused.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientvoucherused = $this->clientvoucherusedRepository->find($id);

        if (empty($clientvoucherused)) {
            return redirect(route('clientvoucheruseds.index'));
        }

        return view('clientvoucheruseds.edit')->with('clientvoucherused', $clientvoucherused);
    }

    /**
     * Update the specified Clientvoucherused in storage.
     *
     * @param int $id
     * @param UpdateClientvoucherusedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientvoucherusedRequest $request)
    {
        $clientvoucherused = $this->clientvoucherusedRepository->find($id);

        if (empty($clientvoucherused)) {
            return redirect(route('clientvoucheruseds.index'));
        }

        $clientvoucherused = $this->clientvoucherusedRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $clientvoucherused->getTable(), $clientvoucherused->id);

        return redirect(route('clientvoucheruseds.index'));
    }

    /**
     * Remove the specified Clientvoucherused from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientvoucherused = $this->clientvoucherusedRepository->find($id);

        if (empty($clientvoucherused)) {
            return redirect(route('clientvoucheruseds.index'));
        }

        $this->clientvoucherusedRepository->delete($id);
        $this->logitem->iudRecord(5, $clientvoucherused->getTable(), $clientvoucherused->id);

        return redirect(route('clientvoucheruseds.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + clientvoucherused::orderBy('name')->pluck('name', 'id')->toArray();
    }
}



