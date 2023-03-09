<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionnairesRequest;
use App\Http\Requests\UpdateQuestionnairesRequest;
use App\Repositories\QuestionnairesRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Questionnaires;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class QuestionnairesController extends AppBaseController
{
    /** @var QuestionnairesRepository $questionnairesRepository*/
    private $questionnairesRepository;
    private $logitem;

    public function __construct(QuestionnairesRepository $questionnairesRepo)
    {
        $this->questionnairesRepository = $questionnairesRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->active == 1) {
                    $btn = '<a href="' . route('questionnaires.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Questionnaires', 'questionnaires']) . '"
                                             class="btn btn-warning btn-sm deleteProduct" title="Deaktiválás"><i class="fas fa-user-check"></i></a>';
                    $btn = $btn.'<a href="' . route('qPartners', [$row->id]) . '"
                                 class="edit btn btn-primary btn-sm editProduct" title="Partnerek"><i class="fas fa-handshake"></i></a>';
                } else {
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Questionnaires', 'questionnaires']) . '"
                                             class="btn btn-danger btn-sm deleteProduct" title="Aktiválás"><i class="fas fa-user-alt-slash"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Questionnaires.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('questionnaires as t1')
                    ->whereNull('t1.deleted_at')
                    ->where('t1.active', 1)
                    ->get();
                return $this->dwData($data);

            }

            return view('questionnaires.index');
        }
    }

    public function questionnairesIndex(Request $request, $active = null, $basicpackage = null)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('questionnaires as t1')
                    ->whereNull('t1.deleted_at')
                    ->where( function($query) use ($active) {
                        if (is_null($active) || $active == -9999 ) {
                            $query->whereNotNull('t1.active');
                        } else {
                            $query->where('t1.active', '=', $active);
                        }
                    })
                    ->where( function($query) use ($basicpackage) {
                        if (is_null($basicpackage) || $basicpackage == 2 ) {
                            $query->whereNotNull('t1.basicpackage');
                        } else {
                            $query->where('t1.basicpackage', '=', $basicpackage);
                        }
                    })
                    ->get();
                return $this->dwData($data);

            }

            return view('questionnaires.index');
        }
    }

    /**
     * Show the form for creating a new Questionnaires.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created Questionnaires in storage.
     *
     * @param CreateQuestionnairesRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnairesRequest $request)
    {
        $input = $request->all();

        $input['qrcode'] = 'http';
        $questionnaires = $this->questionnairesRepository->create($input);
        $questionnaires->qrcode = 'http://quetionnarie/' . $questionnaires->id;
        $questionnaires->save();
        $this->logitem->iudRecord(3, $questionnaires->getTable(), $questionnaires->id);

        return redirect(route('questionnaires.index'));
    }

    /**
     * Display the specified Questionnaires.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.show')->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for editing the specified Questionnaires.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.edit')->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for editing the specified Questionnaires.
     *
     * @param int $id
     *
     * @return Response
     */
    public function qPartners($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.questionnariePartners')->with('questionnaires', $questionnaires);
    }

    public function questionnairesEdit($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.edit')->with('questionnaires', $questionnaires);
    }

    /**
     * Update the specified Questionnaires in storage.
     *
     * @param int $id
     * @param UpdateQuestionnairesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnairesRequest $request)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        $questionnaires = $this->questionnairesRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $questionnaires->getTable(), $questionnaires->id);

        return redirect(route('questionnaires.index'));
    }

    /**
     * Remove the specified Questionnaires from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            return redirect(route('questionnaires.index'));
        }

        $this->questionnairesRepository->delete($id);
        $this->logitem->iudRecord(5, $questionnaires->getTable(), $questionnaires->id);

        return redirect(route('questionnaires.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + questionnaires::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



