<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::get();
        return view('users.roles',compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles'
        ]);
        Role::create($request->all());
        return redirect()->back()->with('message','Role created Successfully');
    }
  
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:roles,name,'.$id
        ]);
        $role = Role::find($id);
        $role->update($request->all());
        return redirect()->back()->with('message','Role Updated Successfully');
        
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->back()->with('message','Role Deleted Successfully');
        
    }
}
