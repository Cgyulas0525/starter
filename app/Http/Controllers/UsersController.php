<?php

namespace App\Http\Controllers;

use App\Classes\imageUrl;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;

use App\Models\Users;

use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use DB;
use DataTables;
use myUser;
use App\Classes\LogitemClass;

class UsersController extends AppBaseController
{
    /** @var UsersRepository $usersRepository*/
    private $usersRepository;
    private $logitem;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
        $this->logitem = new LogitemClass();
    }

    public function dwData($data)
    {
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('users.edit', [$row->id]) . '"
                             class="edit btn btn-success btn-sm editProduct" title="Módosítás"><i class="fa fa-paint-brush"></i></a>';
                $btn = $btn.'<a href="' . route('beforeDestroys', ['Users', $row["id"], 'users']) . '"
                                 class="btn btn-danger btn-sm deleteProduct" title="Törlés"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if( myUser::check() ){

            if ($request->ajax()) {

                $data = $this->usersRepository->all();
                return $this->dwData($data);

            }

            return view('users.index');
        }
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $file = $request->file('image_url');
        $imageUrl = new imageUrl($file);
        $input['password'] = md5($input['password']);

        if (!empty($file)){
            $input['image_url'] = $imageUrl->pictureUpload();
        }

        $users = $this->usersRepository->create($input);
        $this->logitem->iudRecord(3, $users->getTable(), $users->id);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            return redirect(route('users.index'));
        }
        $input = $request->all();

        $file = $request->file('image_url');
        $imageUrl = new imageUrl($file);

        if (!empty($file)){
            $input['image_url'] = $imageUrl->pictureUpload();
        }

        $users = $this->usersRepository->update($input, $id);
        $this->logitem->iudRecord(4, $users->getTable(), $users->id);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);
        $this->logitem->iudRecord(5, $users->getTable(), $users->id);

        return redirect(route('users.index'));
    }

        /*
         * Dropdown for field select
         *
         * return array
         */
        public static function DDDW() : array
        {
            return [" "] + users::orderBy('name')->pluck('name', 'id')->toArray();
        }
}



