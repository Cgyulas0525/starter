<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidpostcodesRequest;
use App\Http\Requests\UpdateValidpostcodesRequest;
use App\Repositories\ValidpostcodesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Validpostcodes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class ValidpostcodesController extends AppBaseController
{
    /** @var ValidpostcodesRepository $validpostcodesRepository*/
    private $validpostcodesRepository;
    private $logitem;

    public function __construct(ValidpostcodesRepository $validpostcodesRepo)
    {
        $this->validpostcodesRepository = $validpostcodesRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
//            ->addColumn('settlementName', function($data) { return $data->settlement->name; })
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->active == 1) {
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Validpostcodes', 'validpostcodes']) . '"
                                         class="btn btn-warning btn-sm deleteProduct" title="Deaktiválás"><i class="fas fa-user-check"></i></a>';
                } else {
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Validpostcodes', 'validpostcodes']) . '"
                                         class="btn btn-danger btn-sm deleteProduct" title="Aktiválás"><i class="fas fa-user-alt-slash"></i></a>';
                }
                $btn = $btn.'<a href="' . route('validpostcodes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Validpostcodes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('validpostcodes as t1')
                    ->join('settlements as t2', 't2.id', '=', 't1.settlement_id')
                    ->select('t1.*', 't2.name as settlementName')
                    ->whereNull('t1.deleted_at')
                    ->where( 't1.active', 1)
                    ->get();
                return $this->dwData($data);

            }

            return view('validpostcodes.index');
        }
    }

    public function validPostCodesIndex(Request $request, $active = null)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('validpostcodes as t1')
                            ->join('settlements as t2', 't2.id', '=', 't1.settlement_id')
                            ->select('t1.*', 't2.name as settlementName')
                            ->whereNull('t1.deleted_at')
                            ->where( function($query) use ($active) {
                                if (is_null($active) || $active == -9999 ) {
                                    $query->whereNotNull('t1.active');
                                } else {
                                    $query->where('t1.active', '=', $active);
                                }
                            })
                            ->get();

                return $this->dwData($data);

            }

            return view('validpostcodes.index');
        }
    }

    /**
     * Show the form for creating a new Validpostcodes.
     *
     * @return Response
     */
    public function create()
    {
        return view('validpostcodes.create');
    }

    /**
     * Store a newly created Validpostcodes in storage.
     *
     * @param CreateValidpostcodesRequest $request
     *
     * @return Response
     */
    public function store(CreateValidpostcodesRequest $request)
    {
        $input = $request->all();

        $validpostcodes = $this->validpostcodesRepository->create($input);
        $this->logitem->iudRecord(3, $validpostcodes->getTable(), $validpostcodes->id);

        return redirect(route('validpostcodes.index'));
    }

    /**
     * Display the specified Validpostcodes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $validpostcodes = $this->validpostcodesRepository->find($id);

        if (empty($validpostcodes)) {
            return redirect(route('validpostcodes.index'));
        }

        return view('validpostcodes.show')->with('validpostcodes', $validpostcodes);
    }

    /**
     * Show the form for editing the specified Validpostcodes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $validpostcodes = $this->validpostcodesRepository->find($id);

        if (empty($validpostcodes)) {
            return redirect(route('validpostcodes.index'));
        }

        return view('validpostcodes.edit')->with('validpostcodes', $validpostcodes);
    }

    /**
     * Update the specified Validpostcodes in storage.
     *
     * @param int $id
     * @param UpdateValidpostcodesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateValidpostcodesRequest $request)
    {
        $validpostcodes = $this->validpostcodesRepository->find($id);

        if (empty($validpostcodes)) {
            return redirect(route('validpostcodes.index'));
        }

        $validpostcodes = $this->validpostcodesRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $validpostcodes->getTable(), $validpostcodes->id);

        return redirect(route('validpostcodes.index'));
    }

    /**
     * Remove the specified Validpostcodes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $validpostcodes = $this->validpostcodesRepository->find($id);

        if (empty($validpostcodes)) {
            return redirect(route('validpostcodes.index'));
        }

        $this->validpostcodesRepository->delete($id);
        $this->logitem->iudRecord(5, $validpostcodes->getTable(), $validpostcodes->id);

        return redirect(route('validpostcodes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + validpostcodes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



