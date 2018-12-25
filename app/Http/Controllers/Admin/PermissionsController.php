<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25/025
 * Time: 14:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController  extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }
}