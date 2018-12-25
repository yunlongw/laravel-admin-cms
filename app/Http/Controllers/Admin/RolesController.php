<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25/025
 * Time: 14:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
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
        $role = Role::create($request->except('permission'));
        //权限
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        //给角色授予权限
        $role->givePermissionTo($permissions);

        return redirect()->route('admin.roles.index');
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

        return view('admin.roles.index', compact('role', 'permissions'));
    }
}