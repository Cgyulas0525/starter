<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientquestionnariesRequest;
use App\Http\Requests\UpdateClientquestionnariesRequest;
use App\Repositories\ClientquestionnariesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Clientquestionnaries;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;

class ClientquestionnariesController extends AppBaseController
{
    /** @var ClientquestionnariesRepository $clientquestionnariesRepository*/
    private $clientquestionnariesRepository;

    public function __construct(ClientquestionnariesRepository $clientquestionnariesRepo)
    {
        $this->clientquestionnariesRepository = $clientquestionnariesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
//                $btn = '<a href="' . route('clientquestionnaries.edit', [$row->id]) . '"
//                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
//                $btn = $btn.'<a href="' . route('beforeDestroys', ['Clientquestionnaries', $row->id, 'clientquestionnaries']) . '"
//                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Clientquestionnaries.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->clientquestionnariesRepository->all();
                return $this->dwData($data);

            }

            return view('clientquestionnaries.index');
        }
    }

    /**
     * Display a listing of the Clientvouchers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function cqIndex(Request $request, $id)
    {
        if( myUser::check() ){


            if ($request->ajax()) {

                $data = DB::table('clientquestionnaries as t1')
                    ->join('questionnaires as t2', 't2.id', '=', 't1.questionnarie_id')
                    ->join('clients as t3', 't3.id', '=', 't1.client_id')
                    ->select('t1.*', 't2.name as questionnarieName', 't3.name as clientName')
                    ->where('t1.client_id', $id)
                    ->whereNull('t1.deleted_at')
                    ->get();

                return $this->dwData($data);

            }

            return view('clientvouchers.index');
        }
    }


    /**
     * Show the form for creating a new Clientquestionnaries.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientquestionnaries.create');
    }

    /**
     * Store a newly created Clientquestionnaries in storage.
     *
     * @param CreateClientquestionnariesRequest $request
     *
     * @return Response
     */
    public function store(CreateClientquestionnariesRequest $request)
    {
        $input = $request->all();

        $clientquestionnaries = $this->clientquestionnariesRepository->create($input);

        return redirect(route('clientquestionnaries.index'));
    }

    /**
     * Display the specified Clientquestionnaries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientquestionnaries = $this->clientquestionnariesRepository->find($id);

        if (empty($clientquestionnaries)) {
            return redirect(route('clientquestionnaries.index'));
        }

        return view('clientquestionnaries.show')->with('clientquestionnaries', $clientquestionnaries);
    }

    /**
     * Show the form for editing the specified Clientquestionnaries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientquestionnaries = $this->clientquestionnariesRepository->find($id);

        if (empty($clientquestionnaries)) {
            return redirect(route('clientquestionnaries.index'));
        }

        return view('clientquestionnaries.edit')->with('clientquestionnaries', $clientquestionnaries);
    }

    /**
     * Update the specified Clientquestionnaries in storage.
     *
     * @param int $id
     * @param UpdateClientquestionnariesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientquestionnariesRequest $request)
    {
        $clientquestionnaries = $this->clientquestionnariesRepository->find($id);

        if (empty($clientquestionnaries)) {
            return redirect(route('clientquestionnaries.index'));
        }

        $clientquestionnaries = $this->clientquestionnariesRepository->update($request->all(), $id);

        return redirect(route('clientquestionnaries.index'));
    }

    /**
     * Remove the specified Clientquestionnaries from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientquestionnaries = $this->clientquestionnariesRepository->find($id);

        if (empty($clientquestionnaries)) {
            return redirect(route('clientquestionnaries.index'));
        }

        $this->clientquestionnariesRepository->delete($id);

        return redirect(route('clientquestionnaries.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + clientquestionnaries::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



