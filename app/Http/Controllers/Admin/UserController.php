<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BlockStatus;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_name'] = 'User List';
        $data['users'] = Admin::all();
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_name'] = 'Create User';
        $data['roles'] = Role::pluck('name', 'name')->all();
        return view('admin.users.create', $data);
    }

    public function signupUsers()
    {
        $data['page_name'] = 'Authors';
        $data['users']     =  User::all();
        return view('admin.users.signup_users', $data);
    }

    public function signupUserChange($id)
    {
        $user = User::find($id);
        if ($user->status == Status::ACTIVE) {
            $user->status = Status::INACTIVE;
        } else {
            $user->status = Status::ACTIVE;
        }
        $user->save();
        $notification = array(
            'message' => 'Status Change Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('signup.users.index')->with($notification);
    }

    public function userBlockChange($id)
    {
        $user = User::find($id);
        if ($user->block_status == BlockStatus::UNBLOCK) {
            $user->block_status = BlockStatus::BLOCK;
        } else {
            $user->block_status = BlockStatus::UNBLOCK;
        }
        $user->save();
        $notification = array(
            'message' => 'Block Status Change Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('signup.users.index')->with($notification);
    }

    public function signupUsersReject($id)
    {
        $user = User::where('id', $id)->update(['status' => Status::INACTIVE]);
        $notification = array(
            'message' => 'Author rejected Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('signup.users.index')->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|unique:admins,email',
            'roles' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $input = $request->all();
        $input['name'] = $input['first_name'] . ' ' . $input['last_name'];
        $input['username'] = $input['name'] . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        $input['password'] = Hash::make($input['password']);
        $admin = Admin::create($input);
        $admin->assignRole($request->input('roles'));
        $notification = array(
            'message' => 'User Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = Admin::find($id);
        $data['page_name'] = 'User View';
        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_name'] = 'User Edit';
        $data['user'] = Admin::find($id);
        $data['roles'] = Role::all();
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|unique:admins,email,' . $id,
            'roles' => 'required',
            'password' => 'confirmed'
        ]);

        $admin = Admin::find($id);
        $input = $request->all();
        $input['name'] = $input['first_name'] . ' ' . $input['last_name'];
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = $admin->password;
        }
        $admin->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $admin->assignRole($request->input('roles'));
        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }
}
