<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientvouchersRequest;
use App\Http\Requests\UpdateClientvouchersRequest;
use App\Repositories\ClientvouchersRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Clientvouchers;
use App\Classes\LogitemClass;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;

class ClientvouchersController extends AppBaseController
{
    /** @var ClientvouchersRepository $clientvouchersRepository*/
    private $clientvouchersRepository;
    private $logitem;

    public function __construct(ClientvouchersRepository $clientvouchersRepo)
    {
        $this->clientvouchersRepository = $clientvouchersRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '';
//                if ( $row->used > 0 ) {
                    $btn = $btn.'<a href="' . route('clientvouchers.edit', [$row->id]) . '"
                                 class="edit btn btn-primary btn-sm editProduct" title="Felhasználások"><i class="fas fa-id-card-alt"></i></a>';
//                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Clientvouchers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->clientvouchersRepository->all();
                return $this->dwData($data);

            }

            return view('clientvouchers.index');
        }
    }

    /**
     * Display a listing of the Clientvouchers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function cvIndex(Request $request, $id)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = DB::table('clientvouchers as t1')
                    ->join('vouchers as t2', 't2.id', '=', 't1.voucher_id')
                    ->join('clients as t3', 't3.id', '=', 't1.client_id')
                    ->join('partners as t4', 't4.id', '=', 't2.partner_id')
                    ->select('t1.*', 't2.name as voucherName', 't3.name as clientName', 't4.name as partnerName')
                    ->where('t1.client_id', $id)
                    ->whereNull('t1.deleted_at')
                    ->get();

                return $this->dwData($data);

            }

            return view('clientvouchers.index');
        }
    }

    /**
     * Show the form for creating a new Clientvouchers.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientvouchers.create');
    }

    /**
     * Store a newly created Clientvouchers in storage.
     *
     * @param CreateClientvouchersRequest $request
     *
     * @return Response
     */
    public function store(CreateClientvouchersRequest $request)
    {
        $input = $request->all();

        $clientvouchers = $this->clientvouchersRepository->create($input);
        $this->logitem->iudRecord(3, $clientvouchers->getTable(), $clientvouchers->id);

        return redirect(route('clientvouchers.index'));
    }

    /**
     * Display the specified Clientvouchers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientvouchers = $this->clientvouchersRepository->find($id);

        if (empty($clientvouchers)) {
            return redirect(route('clientvouchers.index'));
        }

        return view('clientvouchers.show')->with('clientvouchers', $clientvouchers);
    }

    /**
     * Show the form for editing the specified Clientvouchers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientvouchers = $this->clientvouchersRepository->find($id);

        if (empty($clientvouchers)) {
            return redirect(route('clientvouchers.index'));
        }

        return view('clientvouchers.edit')->with('clientvouchers', $clientvouchers);
    }

    /**
     * Update the specified Clientvouchers in storage.
     *
     * @param int $id
     * @param UpdateClientvouchersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientvouchersRequest $request)
    {
        $clientvouchers = $this->clientvouchersRepository->find($id);

        if (empty($clientvouchers)) {
            return redirect(route('clientvouchers.index'));
        }

        $clientvouchers = $this->clientvouchersRepository->update($request->all(), $id);
        $this->logitem->iudRecord(4, $clientvouchers->getTable(), $clientvouchers->id);

        return redirect(route('clientvouchers.index'));
    }

    /**
     * Remove the specified Clientvouchers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientvouchers = $this->clientvouchersRepository->find($id);

        if (empty($clientvouchers)) {
            return redirect(route('clientvouchers.index'));
        }

        $this->clientvouchersRepository->delete($id);
        $this->logitem->iudRecord(6, $clientvouchers->getTable(), $clientvouchers->id);

        return redirect(route('clientvouchers.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + clientvouchers::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



