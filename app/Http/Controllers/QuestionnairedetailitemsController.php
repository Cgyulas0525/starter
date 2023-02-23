<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionnairedetailitemsRequest;
use App\Http\Requests\UpdateQuestionnairedetailitemsRequest;
use App\Repositories\QuestionnairedetailitemsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Questionnairedetailitems;
use App\Models\Questionnairedetails;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class QuestionnairedetailitemsController extends AppBaseController
{
    /** @var QuestionnairedetailitemsRepository $questionnairedetailitemsRepository*/
    private $questionnairedetailitemsRepository;

    public function __construct(QuestionnairedetailitemsRepository $questionnairedetailitemsRepo)
    {
        $this->questionnairedetailitemsRepository = $questionnairedetailitemsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('questionnairedetailitems.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Questionnairedetailitems', $row->id, 'qdEdit', $row->questionnariedetail_id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Questionnairedetailitems.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->questionnairedetailitemsRepository->all();
                return $this->dwData($data);

            }

            return view('questionnairedetailitems.index');
        }
    }

    public function qdiIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = DB::table('questionnairedetailitems')
                    ->where('questionnariedetail_id', $id)
                    ->whereNull('deleted_at')
                    ->get();
                return $this->dwData($data);

            }

            return view('questionnairedetailitems.index');
        }
    }

    /**
     * Show the form for creating a new Questionnairedetailitems.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnairedetailitems.create');
    }

    public function qdiCreate($id)
    {
        $questionnairedetail = Questionnairedetails::find($id);
        return view('questionnairedetailitems.create')->with('questionnairedetail', $questionnairedetail);
    }

    /**
     * Store a newly created Questionnairedetailitems in storage.
     *
     * @param CreateQuestionnairedetailitemsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnairedetailitemsRequest $request)
    {
        $input = $request->all();

        $questionnairedetailitems = $this->questionnairedetailitemsRepository->create($input);

        return redirect(route('questionnairedetails.edit', $questionnairedetailitems->questionnariedetail_id));
    }

    /**
     * Display the specified Questionnairedetailitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnairedetailitems = $this->questionnairedetailitemsRepository->find($id);

        if (empty($questionnairedetailitems)) {
            return redirect(route('questionnairedetailitems.index'));
        }

        return view('questionnairedetailitems.show')->with('questionnairedetailitems', $questionnairedetailitems);
    }

    /**
     * Show the form for editing the specified Questionnairedetailitems.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnairedetailitems = $this->questionnairedetailitemsRepository->find($id);

        if (empty($questionnairedetailitems)) {
            return redirect(route('questionnairedetailitems.index'));
        }

        return view('questionnairedetailitems.edit')->with('questionnairedetailitems', $questionnairedetailitems);
    }

    /**
     * Update the specified Questionnairedetailitems in storage.
     *
     * @param int $id
     * @param UpdateQuestionnairedetailitemsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnairedetailitemsRequest $request)
    {
        $questionnairedetailitems = $this->questionnairedetailitemsRepository->find($id);

        if (empty($questionnairedetailitems)) {
            return redirect(route('questionnairedetailitems.index'));
        }

        $questionnairedetailitems = $this->questionnairedetailitemsRepository->update($request->all(), $id);

        return redirect(route('questionnairedetailitems.index'));
    }

    /**
     * Remove the specified Questionnairedetailitems from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnairedetailitems = $this->questionnairedetailitemsRepository->find($id);

        if (empty($questionnairedetailitems)) {
            return redirect(route('questionnairedetailitems.index'));
        }

        $this->questionnairedetailitemsRepository->delete($id);

        return redirect(route('questionnairedetailitems.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + questionnairedetailitems::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



