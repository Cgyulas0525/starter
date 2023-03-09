<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsertypesRequest;
use App\Http\Requests\UpdateUsertypesRequest;
use App\Repositories\UsertypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Usertypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class UsertypesController extends AppBaseController
{
    /** @var UsertypesRepository $usertypesRepository*/
    private $usertypesRepository;
    private $logitem;

    public function __construct(UsertypesRepository $usertypesRepo)
    {
        $this->usertypesRepository = $usertypesRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('usertypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Usertypes', $row["id"], 'usertypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Usertypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->usertypesRepository->all();
                return $this->dwData($data);

            }

            return view('usertypes.index');
        }
    }

    /**
     * Show the form for creating a new Usertypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('usertypes.create');
    }

    /**
     * Store a newly created Usertypes in storage.
     *
     * @param CreateUsertypesRequest $request
     *
     * @return Response
     */
    public function store(CreateUsertypesRequest $request)
    {
        $input = $request->all();

        $usertypes = $this->usertypesRepository->create($input);
        $this->logitem->iudRecord(3, $usertypes->getTable(), $usertypes->id);

        return redirect(route('usertypes.index'));
    }

    /**
     * Display the specified Usertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usertypes = $this->usertypesRepository->find($id);

        if (empty($usertypes)) {
            return redirect(route('usertypes.index'));
        }

        return view('usertypes.show')->with('usertypes', $usertypes);
    }

    /**
     * Show the form for editing the specified Usertypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usertypes = $this->usertypesRepository->find($id);

        if (empty($usertypes)) {
            return redirect(route('usertypes.index'));
        }

        return view('usertypes.edit')->with('usertypes', $usertypes);
    }

    /**
     * Update the specified Usertypes in storage.
     *
     * @param int $id
     * @param UpdateUsertypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsertypesRequest $request)
    {
        $usertypes = $this->usertypesRepository->find($id);

        if (empty($usertypes)) {
            return redirect(route('usertypes.index'));
        }

        $usertypes = $this->usertypesRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $usertypes->getTable(), $usertypes->id);

        return redirect(route('usertypes.index'));
    }

    /**
     * Remove the specified Usertypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usertypes = $this->usertypesRepository->find($id);

        if (empty($usertypes)) {
            return redirect(route('usertypes.index'));
        }

        $this->usertypesRepository->delete($id);
        $this->logitem->iudRecord(5, $usertypes->getTable(), $usertypes->id);

        return redirect(route('usertypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + usertypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



