<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLotteriesRequest;
use App\Http\Requests\UpdateLotteriesRequest;
use App\Repositories\LotteriesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Lotteries;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class LotteriesController extends AppBaseController
{
    /** @var LotteriesRepository $lotteriesRepository*/
    private $lotteriesRepository;
    private $logitem;

    public function __construct(LotteriesRepository $lotteriesRepo)
    {
        $this->lotteriesRepository = $lotteriesRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->active == 1) {
                    $btn = '<a href="' . route('lotteries.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Lotteries', 'lotteries']) . '"
                                             class="btn btn-warning btn-sm deleteProduct" title="Deaktiválás"><i class="fas fa-user-check"></i></a>';
                } else {
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Lotteries', 'lotteries']) . '"
                                             class="btn btn-danger btn-sm deleteProduct" title="Aktiválás"><i class="fas fa-user-alt-slash"></i></a>';
                }
//
//                $btn = $btn.'<a href="' . route('beforeDestroys', ['Lotteries', $row->id, 'lotteries']) . '"
//                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Lotteries.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('lotteries as t1')
                    ->whereNull('t1.deleted_at')
                    ->where('t1.active', 1)
                    ->get();
                return $this->dwData($data);

            }

            return view('lotteries.index');
        }
    }

    public function lotteriesIndex(Request $request, $active = null)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('lotteries as t1')
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

            return view('lotteries.index');
        }
    }

    /**
     * Show the form for creating a new Lotteries.
     *
     * @return Response
     */
    public function create()
    {
        return view('lotteries.create');
    }

    /**
     * Store a newly created Lotteries in storage.
     *
     * @param CreateLotteriesRequest $request
     *
     * @return Response
     */
    public function store(CreateLotteriesRequest $request)
    {
        $input = $request->all();

        $lotteries = $this->lotteriesRepository->create($input);
        $this->logitem->iudRecord(3, $lotteries->getTable(), $lotteries->id);

        return redirect(route('lotteries.index'));
    }

    /**
     * Display the specified Lotteries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lotteries = $this->lotteriesRepository->find($id);

        if (empty($lotteries)) {
            return redirect(route('lotteries.index'));
        }

        return view('lotteries.show')->with('lotteries', $lotteries);
    }

    /**
     * Show the form for editing the specified Lotteries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lotteries = $this->lotteriesRepository->find($id);

        if (empty($lotteries)) {
            return redirect(route('lotteries.index'));
        }

        return view('lotteries.edit')->with('lotteries', $lotteries);
    }

    /**
     * Update the specified Lotteries in storage.
     *
     * @param int $id
     * @param UpdateLotteriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLotteriesRequest $request)
    {
        $lotteries = $this->lotteriesRepository->find($id);

        if (empty($lotteries)) {
            return redirect(route('lotteries.index'));
        }

        $lotteries = $this->lotteriesRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $lotteries->getTable(), $lotteries->id);

        return redirect(route('lotteries.index'));
    }

    /**
     * Remove the specified Lotteries from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lotteries = $this->lotteriesRepository->find($id);

        if (empty($lotteries)) {
            return redirect(route('lotteries.index'));
        }

        $this->lotteriesRepository->delete($id);
        $this->logitem->iudRecord(5, $lotteries->getTable(), $lotteries->id);

        return redirect(route('lotteries.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + lotteries::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



