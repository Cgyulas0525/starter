<?php

namespace App\Http\Controllers;

use App\Classes\ToolsClass;
use App\Http\Requests\CreateQuestionnairedetailsRequest;
use App\Http\Requests\UpdateQuestionnairedetailsRequest;
use App\Models\Questionnaires;
use App\Repositories\QuestionnairedetailsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Questionnairedetails;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;

class QuestionnairedetailsController extends AppBaseController
{
    /** @var QuestionnairedetailsRepository $questionnairedetailsRepository*/
    private $questionnairedetailsRepository;

    public function __construct(QuestionnairedetailsRepository $questionnairedetailsRepo)
    {
        $this->questionnairedetailsRepository = $questionnairedetailsRepo;
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
                if (ToolsClass::usedQuestionnaireCount($row->id) == 0) {
                    $btn = $btn.'<a href="' . route('questionnairedetails.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';

                    $btn = $btn.'<a href="' . route('beforeDestroysWithParam', ['Questionnairedetails', $row->id, 'questionnairesEdit', $row->questionnaire_id]) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
//                    if ($row->listing == 1) {
//                        $btn = $btn.'<a href="' . route('beforeDestroys', ['Questionnairedetails', $row->id, 'questionnairedetails']) . '"
//                                         class="btn btn-info btn-sm deleteProduct" title="Értékek"><i class="fas fa-vote-yea"></i></a>';
//                    }
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Questionnairedetails.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = $this->questionnairedetailsRepository->all();
                return $this->dwData($data);

            }

            return view('questionnairedetails.index');
        }
    }

    public function qdIndex(Request $request, $id)
    {
        if( Auth::check() ){

            if ($request->ajax()) {

                $data = DB::table('questionnairedetails as t1')
                    ->join('detailtypes as t2', 't2.id', '=', 't1.detailtype_id')
                    ->select('t1.*', 't2.name as detailtypeName', 't2.listing')
                    ->where('t1.questionnaire_id', $id)
                    ->whereNull('t1.deleted_at')
                    ->get();
                return $this->dwData($data);

            }

            return view('questionnairedetails.index');
        }
    }

    /**
     * Show the form for creating a new Questionnairedetails.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnairedetails.create');
    }

    public function qdCreate($id)
    {
        $questionnaire = Questionnaires::find($id);
        return view('questionnairedetails.create')->with('questionnaire', $questionnaire);
    }

    /**
     * Store a newly created Questionnairedetails in storage.
     *
     * @param CreateQuestionnairedetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnairedetailsRequest $request)
    {
        $input = $request->all();

        $questionnairedetails = $this->questionnairedetailsRepository->create($input);

        return redirect(route('questionnaires.edit', $questionnairedetails->questionnaire_id));
    }

    /**
     * Display the specified Questionnairedetails.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnairedetails = $this->questionnairedetailsRepository->find($id);

        if (empty($questionnairedetails)) {
            return redirect(route('questionnairedetails.index'));
        }

        return view('questionnairedetails.show')->with('questionnairedetails', $questionnairedetails);
    }

    public function edit($id)
    {
        $questionnairedetails = $this->questionnairedetailsRepository->find($id);

        if (empty($questionnairedetails)) {
            return redirect(route('questionnairedetails.index'));
        }

        return view('questionnairedetails.edit')->with('questionnairedetails', $questionnairedetails);
    }

    /**
     * Update the specified Questionnairedetails in storage.
     *
     * @param int $id
     * @param UpdateQuestionnairedetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnairedetailsRequest $request)
    {
        $questionnairedetails = $this->questionnairedetailsRepository->find($id);

        if (empty($questionnairedetails)) {
            return redirect(route('questionnairedetails.index'));
        }

        $questionnairedetails = $this->questionnairedetailsRepository->update($request->all(), $id);

        return redirect(route('questionnaires.edit', $questionnairedetails->questionnaire_id));
    }

    /**
     * Remove the specified Questionnairedetails from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnairedetails = $this->questionnairedetailsRepository->find($id);

        if (empty($questionnairedetails)) {
            return redirect(route('questionnairedetails.index'));
        }

        $this->questionnairedetailsRepository->delete($id);

        return redirect(route('questionnairedetails.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + questionnairedetails::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



