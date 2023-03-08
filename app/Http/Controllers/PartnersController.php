<?php

namespace App\Http\Controllers;

use App\Classes\imageUrl;
use App\Classes\SettlementsClass;
use App\Http\Requests\CreatePartnersRequest;
use App\Http\Requests\UpdatePartnersRequest;
use App\Repositories\PartnersRepository;
use App\Http\Controllers\AppBaseController;
use App\Classes\LogitemClass;

use App\Models\Partners;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;

class PartnersController extends AppBaseController
{
    /** @var PartnersRepository $partnersRepository*/
    private $partnersRepository;
    private $logitem;

    public function __construct(PartnersRepository $partnersRepo)
    {
        $this->partnersRepository = $partnersRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->active == 1) {
                    $btn = $btn.'<a href="' . route('partners.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                    $btn = $btn.'<a href="' . route('partnerContactEdit', [$row->id]) . '"
                             class="edit btn btn-info btn-sm editProduct" title="Felhasználók"><i class="fas fa-users"></i></a>';
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Partners', 'partners']) . '"
                                         class="btn btn-warning btn-sm deleteProduct" title="Deaktiválás"><i class="fas fa-user-check"></i></a>';
                    $btn = $btn.'<a href="' . route('pqEdit', [$row->id]) . '"
                                 class="edit btn btn-primary btn-sm editProduct" title="Űrlapok"><i class="fas fa-question-circle"></i></a>';
                } else {
                    $btn = $btn.'<a href="' . route('beforeActivation', [$row->id, 'Partners', 'partners']) . '"
                                         class="btn btn-danger btn-sm deleteProduct" title="Aktiválás"><i class="fas fa-user-alt-slash"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Partners.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('partners as t1')
                    ->join('partnertypes as t2', 't2.id', '=', 't1.partnertype_id')
                    ->join('settlements as t3', 't3.id', '=', 't1.settlement_id')
                    ->select('t1.*', DB::raw('concat(t1.postcode, " ", t3.name, " ", t1.address) as fulladdress'), 't2.name as partnerTypesName', 't3.name as settlementName')
                    ->whereNull('t1.deleted_at')
                    ->where('t1.active', 1)
                    ->get();
                return $this->dwData($data);

            }

            return view('partners.index');
        }
    }

    public function partnersIndex(Request $request, $active = null)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('partners as t1')
                    ->join('partnertypes as t2', 't2.id', '=', 't1.partnertype_id')
                    ->join('settlements as t3', 't3.id', '=', 't1.settlement_id')
                    ->select('t1.*', DB::raw('concat(t1.postcode, " ", t3.name, " ", t1.address) as fulladdress'), 't2.name as partnerTypesName', 't3.name as settlementName')
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

            return view('partners.index');
        }
    }


    /**
     * Show the form for creating a new Partners.
     *
     * @return Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created Partners in storage.
     *
     * @param CreatePartnersRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnersRequest $request)
    {
        $input = $request->all();

        $file = $request->file('logo_url');

        if (!empty($file)){
            $imageUrl = new imageUrl($file);
            $input['logourl'] = $imageUrl->pictureUpload();
        }

        $partners = $this->partnersRepository->create($input);
        $this->logitem->iudRecord(3, $partners->getTable(), $partners->id);

        return redirect(route('partners.index'));
    }

    /**
     * Display the specified Partners.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }

        return view('partners.show')->with('partners', $partners);
    }

    /**
     * Show the form for editing the specified Partners.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }

        return view('partners.edit')->with('partners', $partners);
    }

    /**
     * Show the form for editing the specified Partners.
     *
     * @param int $id
     *
     * @return Response
     */
    public function partnerContactEdit($id)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }

        return view('partners.partnerContactsEdit')->with('partners', $partners);
    }

    /**
     * Show the form for editing the specified Partners.
     *
     * @param int $id
     *
     * @return Response
     */
    public function pqEdit($id)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }

        return view('partners.partnerQuestionnaires')->with('partners', $partners);
    }

    /**
     * Update the specified Partners in storage.
     *
     * @param int $id
     * @param UpdatePartnersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnersRequest $request)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }
        $input = $request->all();

        $file = $request->file('logo_url');

        if (!empty($file)){
            $imageUrl = new imageUrl($file);
            $input['logourl'] = $imageUrl->pictureUpload();
        }

        $partners = $this->partnersRepository->update($input, $id);
        $this->logitem->iudRecord(4, $partners->getTable(), $partners->id);

        return redirect(route('partners.index'));
    }

    /**
     * Remove the specified Partners from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partners = $this->partnersRepository->find($id);

        if (empty($partners)) {
            return redirect(route('partners.index'));
        }

        $this->partnersRepository->delete($id);
        $this->logitem->iudRecord(5, $partners->getTable(), $partners->id);

        return redirect(route('partners.index'));
    }

    /*
     * Dropdown for field select
     *
     * return array
     */
    public static function DDDW() : array
    {
        return [" "] + partners::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function postcodeSettlementDDDW(Request $request) {
        return SettlementsClass::postcodeSettlementDDDW($request->get('postcode'));
    }

}



