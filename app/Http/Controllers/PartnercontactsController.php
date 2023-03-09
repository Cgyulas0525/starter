<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnercontactsRequest;
use App\Http\Requests\UpdatePartnercontactsRequest;
use App\Repositories\PartnercontactsRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Partnercontacts;
use App\Models\Partners;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class PartnercontactsController extends AppBaseController
{
    /** @var PartnercontactsRepository $partnercontactsRepository*/
    private $partnercontactsRepository;
    private $logitem;

    public function __construct(PartnercontactsRepository $partnercontactsRepo)
    {
        $this->partnercontactsRepository = $partnercontactsRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->active == 1) {
                    $btn = $btn.'<a href="' . route('partnercontacts.edit', [$row->id]) . '"
                                 class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn.'<a href="' . route('beforeActivationWithParam', ['Partnercontacts', $row->id, 'partnerContactEdit', $row->partner_id]) . '"
                                         class="btn btn-warning btn-sm deleteProduct" title="Deaktiválás"><i class="fas fa-user-check"></i></a>';
                } else {
                    $btn = $btn.'<a href="' . route('beforeActivationWithParam', ['Partnercontacts', $row->id, 'partnerContactEdit', $row->partner_id])  . '"
                                         class="btn btn-danger btn-sm deleteProduct" title="Aktiválás"><i class="fas fa-user-alt-slash"></i></a>';
                }
//                $btn = $btn.'<a href="' . route('beforeDestroys', ['Partnercontacts', $row->id, 'partnercontacts']) . '"
//                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Partnercontacts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->partnercontactsRepository->all();
                return $this->dwData($data);

            }

            return view('partnercontacts.index');
        }
    }

    /**
     * Display a listing of the Partnercontacts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function partnerContactsIndex(Request $request, $partner, $active = 1)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('partnercontacts as t1')
                    ->select('t1.*')
                    ->where('t1.partner_id', $partner)
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

            return view('partnercontacts.index');
        }
    }

    /**
     * Show the form for creating a new Partnercontacts.
     *
     * @return Response
     */
    public function create()
    {
        return view('partnercontacts.create');
    }

    public function partnerContactCreate($id)
    {
        $partner = Partners::find($id);
        return view('partnercontacts.create')->with('partner', $partner);
    }

    /**
     * Store a newly created Partnercontacts in storage.
     *
     * @param CreatePartnercontactsRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnercontactsRequest $request)
    {
        $input = $request->all();

        $partnercontacts = $this->partnercontactsRepository->create($input);
        $this->logitem->iudRecord(3, $partnercontacts->getTable(), $partnercontacts->id);

        $partners = Partners::find($partnercontacts->id);

        return redirect(route('partnerContactEdit', ['partners' => $partners]));
    }

    /**
     * Display the specified Partnercontacts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partnercontacts = $this->partnercontactsRepository->find($id);

        if (empty($partnercontacts)) {
            return redirect(route('partnercontacts.index'));
        }

        return view('partnercontacts.show')->with('partnercontacts', $partnercontacts);
    }

    /**
     * Show the form for editing the specified Partnercontacts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partnercontacts = $this->partnercontactsRepository->find($id);

        if (empty($partnercontacts)) {
            return redirect(route('partnercontacts.index'));
        }

        return view('partnercontacts.edit')->with('partnercontacts', $partnercontacts);
    }

    /**
     * Update the specified Partnercontacts in storage.
     *
     * @param int $id
     * @param UpdatePartnercontactsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnercontactsRequest $request)
    {
        $partnercontacts = $this->partnercontactsRepository->find($id);

        if (empty($partnercontacts)) {
            return redirect(route('partnercontacts.index'));
        }

        $partnercontacts = $this->partnercontactsRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $partnercontacts->getTable(), $partnercontacts->id);

        return redirect(route('partnercontacts.index'));
    }

    /**
     * Remove the specified Partnercontacts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partnercontacts = $this->partnercontactsRepository->find($id);

        if (empty($partnercontacts)) {
            return redirect(route('partnercontacts.index'));
        }

        $this->partnercontactsRepository->delete($id);
        $this->logitem->iudRecord(5, $partnercontacts->getTable(), $partnercontacts->id);

        return redirect(route('partnercontacts.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + partnercontacts::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



