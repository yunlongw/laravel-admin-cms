<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25/025
 * Time: 14:41
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\admin\UpdateRolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends AdminBaseController
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get()->pluck('name', 'name');
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StorePermissionsRequest $request)
    {
        //创建角色
        $data = $request->except('permission');
        $data['guard_name'] = "admin";
        $role = Role::create();
        //权限
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        //给角色授予权限
        $role->givePermissionTo($permissions);

        return redirect()->route('roles.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $permissions = Permission::get()->pluck('name', 'name');
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     *
     * @param UpdateRolesRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index');
    }
}