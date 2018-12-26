<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends AdminBaseController
{
    public function permission()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->permission();
        $users = Admin::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->permission();
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.users.create', compact('roles'));

    }

    /**
     * @param StoreUsersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUsersRequest $request)
    {
        $this->permission();
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = Admin::create($data);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->permission();
        $user = Admin::findOrFail($id);
        $roles = Role::get()->pluck('name', 'name');
        return view("admin.users.edit", compact('user', "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $this->permission();
        $user = Admin::findOrFail($id);
        $data = $request->all();
        if (isset($data['password']) && $data['password']) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permission();
        $user = Admin::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
