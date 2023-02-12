<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailTypesRequest;
use App\Http\Requests\UpdateDetailTypesRequest;
use App\Repositories\DetailTypesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\DetailTypes;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class DetailTypesController extends AppBaseController
{
    /** @var DetailTypesRepository $detailTypesRepository*/
    private $detailTypesRepository;

    public function __construct(DetailTypesRepository $detailTypesRepo)
    {
        $this->detailTypesRepository = $detailTypesRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('listingName', function($data) { return $data->listingName; })
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('detailTypes.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['DetailTypes', $row["id"], 'detailTypes']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the DetailTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->detailTypesRepository->all();
                return $this->dwData($data);

            }

            return view('detail_types.index');
        }
    }

    /**
     * Show the form for creating a new DetailTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_types.create');
    }

    /**
     * Store a newly created DetailTypes in storage.
     *
     * @param CreateDetailTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailTypesRequest $request)
    {
        $input = $request->all();

        $detailTypes = $this->detailTypesRepository->create($input);

        return redirect(route('detailTypes.index'));
    }

    /**
     * Display the specified DetailTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailTypes = $this->detailTypesRepository->find($id);

        if (empty($detailTypes)) {
            return redirect(route('detailTypes.index'));
        }

        return view('detail_types.show')->with('detailTypes', $detailTypes);
    }

    /**
     * Show the form for editing the specified DetailTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailTypes = $this->detailTypesRepository->find($id);

        if (empty($detailTypes)) {
            return redirect(route('detailTypes.index'));
        }

        return view('detail_types.edit')->with('detailTypes', $detailTypes);
    }

    /**
     * Update the specified DetailTypes in storage.
     *
     * @param int $id
     * @param UpdateDetailTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailTypesRequest $request)
    {
        $detailTypes = $this->detailTypesRepository->find($id);

        if (empty($detailTypes)) {
            return redirect(route('detailTypes.index'));
        }

        $detailTypes = $this->detailTypesRepository->update($request->all(), $id);

        return redirect(route('detailTypes.index'));
    }

    /**
     * Remove the specified DetailTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailTypes = $this->detailTypesRepository->find($id);

        if (empty($detailTypes)) {
            return redirect(route('detailTypes.index'));
        }

        $this->detailTypesRepository->delete($id);

        return redirect(route('detailTypes.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + detailTypes::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



