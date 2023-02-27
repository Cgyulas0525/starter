<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogitemtypesRequest;
use App\Http\Requests\UpdateLogitemtypesRequest;
use App\Repositories\LogitemtypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Logitemtypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;

class LogitemtypesController extends AppBaseController
{
    /** @var LogitemtypesRepository $logitemtypesRepository*/
    private $logitemtypesRepository;

    public function __construct(LogitemtypesRepository $logitemtypesRepo)
    {
        $this->logitemtypesRepository = $logitemtypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('logitemtypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Logitemtypes', $row["id"], 'logitemtypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Logitemtypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->logitemtypesRepository->all();
                return $this->dwData($data);

            }

            return view('logitemtypes.index');
        }
    }

    /**
     * Show the form for creating a new Logitemtypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('logitemtypes.create');
    }

    /**
     * Store a newly created Logitemtypes in storage.
     *
     * @param CreateLogitemtypesRequest $request
     *
     * @return Response
     */
    public function store(CreateLogitemtypesRequest $request)
    {
        $input = $request->all();

        $logitemtypes = $this->logitemtypesRepository->create($input);

        return redirect(route('logitemtypes.index'));
    }

    /**
     * Display the specified Logitemtypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logitemtypes = $this->logitemtypesRepository->find($id);

        if (empty($logitemtypes)) {
            return redirect(route('logitemtypes.index'));
        }

        return view('logitemtypes.show')->with('logitemtypes', $logitemtypes);
    }

    /**
     * Show the form for editing the specified Logitemtypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logitemtypes = $this->logitemtypesRepository->find($id);

        if (empty($logitemtypes)) {
            return redirect(route('logitemtypes.index'));
        }

        return view('logitemtypes.edit')->with('logitemtypes', $logitemtypes);
    }

    /**
     * Update the specified Logitemtypes in storage.
     *
     * @param int $id
     * @param UpdateLogitemtypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogitemtypesRequest $request)
    {
        $logitemtypes = $this->logitemtypesRepository->find($id);

        if (empty($logitemtypes)) {
            return redirect(route('logitemtypes.index'));
        }

        $logitemtypes = $this->logitemtypesRepository->update($request->all(), $id);

        return redirect(route('logitemtypes.index'));
    }

    /**
     * Remove the specified Logitemtypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logitemtypes = $this->logitemtypesRepository->find($id);

        if (empty($logitemtypes)) {
            return redirect(route('logitemtypes.index'));
        }

        $this->logitemtypesRepository->delete($id);

        return redirect(route('logitemtypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + logitemtypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



