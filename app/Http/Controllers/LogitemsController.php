<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogitemsRequest;
use App\Http\Requests\UpdateLogitemsRequest;
use App\Repositories\LogitemsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Logitems;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class LogitemsController extends AppBaseController
{
    /** @var LogitemsRepository $logitemsRepository*/
    private $logitemsRepository;

    public function __construct(LogitemsRepository $logitemsRepo)
    {
        $this->logitemsRepository = $logitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('logitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Logitems', $row["id"], 'logitems']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Logitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->logitemsRepository->all();
                return $this->dwData($data);

            }

            return view('logitems.index');
        }
    }

    /**
     * Show the form for creating a new Logitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('logitems.create');
    }

    /**
     * Store a newly created Logitems in storage.
     *
     * @param CreateLogitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateLogitemsRequest $request)
    {
        $input = $request->all();

        $logitems = $this->logitemsRepository->create($input);

        return redirect(route('logitems.index'));
    }

    /**
     * Display the specified Logitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logitems = $this->logitemsRepository->find($id);

        if (empty($logitems)) {
            return redirect(route('logitems.index'));
        }

        return view('logitems.show')->with('logitems', $logitems);
    }

    /**
     * Show the form for editing the specified Logitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logitems = $this->logitemsRepository->find($id);

        if (empty($logitems)) {
            return redirect(route('logitems.index'));
        }

        return view('logitems.edit')->with('logitems', $logitems);
    }

    /**
     * Update the specified Logitems in storage.
     *
     * @param int $id
     * @param UpdateLogitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogitemsRequest $request)
    {
        $logitems = $this->logitemsRepository->find($id);

        if (empty($logitems)) {
            return redirect(route('logitems.index'));
        }

        $logitems = $this->logitemsRepository->update($request->all(), $id);

        return redirect(route('logitems.index'));
    }

    /**
     * Remove the specified Logitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logitems = $this->logitemsRepository->find($id);

        if (empty($logitems)) {
            return redirect(route('logitems.index'));
        }

        $this->logitemsRepository->delete($id);

        return redirect(route('logitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + logitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



