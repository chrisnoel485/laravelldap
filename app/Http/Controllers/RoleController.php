<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    //
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('role.index', compact('role'));
    }

    public function create()
    {
        //
        return view ('role/create');
    }

    public function store(Request $request)
    {
        $rules =[
            'name'=>'required',
        ];
 
        $validator = Validator::make($rules, [
            'name.required'=>'Nama Role Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
 
            //refresh halaman
            return Redirect::to('role/create')
            ->withErrors($validator);
 
        }else{

            $role = Role::firstOrCreate(['name' => $request->name]);
            Session::flash('message','Succes Add Role');
 
            return redirect('/role');
        }
    }  

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with(['success' => 'Role: <strong>' . $role->name . '</strong> Dihapus']);
    }
}
