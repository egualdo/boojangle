<?php

namespace App\Http\Controllers;

use App\Models\InterestedUser;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Exports\UsersExport;
use App\Exports\NewslettersExport;
use App\Models\Country;
use App\Models\Contact;
use App\Models\Idiom;
use App\Models\RoleUser;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Maatwebsite\Excel\Facades\Excel;
// use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role'])->get();
        // dd($users);
        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('panel.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'No se pudo completar la Operacion');
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado satisfactoriamente');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('panel.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        try {
             DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->role_id = $request->role_id;
            $user->save();

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','No se pudo completar la operacion');
        }
         DB::commit();
        return redirect()->route('users.index')->with('success', 'Usuario actualizado satisfactoriamente');
    }

    public function destroy($id)
    {   

        try {
             DB::beginTransaction();
            $user = User::find($id);
            $user->delete();
        } catch (\Throwable $th) {
             DB::rollBack();
             return redirect()->back()->with('error', 'No se pudo completar la operacion');
        }
         DB::commit();
         return redirect()->route('users.index')->with('success', 'Usuario eliminado satisfactoriamente');
        
    }


    

    //  public function exportInterestedUsers() 
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }

}
