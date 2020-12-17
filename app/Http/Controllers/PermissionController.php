<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{

    public function index()
    {
       //
    }

    public function store(Request $request)
    {
        // dd($request);
        Permission::create($request->all());
        
        return redirect()->back()->with('message','Permission Created');
    }

    public function edit($id)
    {
        $permission =  Permission::find($id);
        return view('users.editpermission',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->back()->with('message','Permission Updated');
    }

    public function destroy($id)
    {
       Permission::find($id)->delete();
       return redirect()->back()->with('message','Permission Deleted');
    }
}
