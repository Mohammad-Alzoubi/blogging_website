<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['permission:roles.menu']);
//    }
    static $viewPathPermission = 'backend.pages.permission_roles.permission.';
    static $viewPathRoles      = 'backend.pages.permission_roles.roles.';
    static $viewPathRolesPermission = 'backend.pages.permission_roles.roles_permission.';

    public function AllPermission(){

        $permissions = Permission::all();
        return view(self::$viewPathPermission.'all_permission',compact('permissions'));
    } // End Method


    public function AddPermission(){

        return view(self::$viewPathPermission.'add_permission');
    } // End Method


    public function StorePermission(Request $request){

        $request->validate([
            'name' => 'required',
            'group_name' => 'required'
        ]);

        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);


        return redirect()->route('backend.permission.index')->with('message', 'Permission Added Successfully');
    }// End Method


    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view(self::$viewPathPermission.'edit_permission',compact('permission'));

    }// End Method


    public function UpdatePermission(Request $request, $id){


        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        return redirect()->route('backend.permission.index')->with('message', 'Permission Updated Successfully');

    }// End Method


    public function DeletePermission(Request $request){

        Permission::findOrFail($request->id_permission)->delete();
        return redirect()->route('backend.permission.index')->with('message', 'Permission Deleted Successfully');

    }// End Method
    ////////////////////// Roles All Method ///////////


    public function AllRoles(){

        $roles = Role::all();
        return view(self::$viewPathRoles.'all_roles',compact('roles'));

    }// End Method


    public function AddRoles(){

        return view(self::$viewPathRoles.'add_roles');

    }// End Method


    public function StoreRoles(Request $request){

        $request->validate([
            'name'=>'required'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('backend.index.roles')->with('message', 'Role Added Successfully');

    }// End Method


    public function EditRoles($id){

        $role = Role::findOrFail($id);
        return view(self::$viewPathRoles.'edit_roles',compact('role'));

    }// End Method

    public function UpdateRoles(Request $request, $id){

        $role = Role::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('backend.index.roles')->with('message', 'Role Updated Successfully');

    }// End Method


    public function DeleteRoles(Request $request){

        Role::findOrFail($request->id_role)->delete();

        return redirect()->route('backend.index.roles')->with('message', 'Role Deleted Successfully');

    }// End Method










    //////////////// Add Roles Permission All Method ////////////


    public function AllRolesPermission(){

        $roles = Role::all();
        return view(self::$viewPathRolesPermission.'all_roles_permission',compact('roles'));

    } // End Method

    public function AddRolesPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view(self::$viewPathRolesPermission.'add_roles_permission',compact('roles','permissions','permission_groups'));

    }// End Method


    public function StoreRolesPermission(Request $request){

        $request->validate([
            'role_id' => 'required',
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($request->role_id);
        $permission = $role->permissions;
//        return $permission;
        $role->revokePermissionTo($permission);

        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
//            DB::table('role_has_permissions')->updateOrInsert($data);
        }

        return redirect()->route('backend.index.roles.permission')->with('message', 'Role Permission Added Successfully');

    }// End Method


    public function AdminEditRoles($id){

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view(self::$viewPathRolesPermission.'edit_roles_permission',compact('role','permissions','permission_groups'));

    } // End Method


    public function RolePermissionUpdate(Request $request,$id){


        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }


        return redirect()->route('backend.index.roles.permission')->with('message', 'Role Permission Updated Successfully');

    }// End Method


    public function AdminDeleteRoles(Request $request){

        $role = Role::findOrFail($request->id_role);
        if (!is_null($role)) {
            $permission = $role->permissions;
            $role->revokePermissionTo($permission);
//            $role->delete();
        }

        return redirect()->back()->with('message', 'Roles Permission Deleted Successfully');

    }// End Method
}

