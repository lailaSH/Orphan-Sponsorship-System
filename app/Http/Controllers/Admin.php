<?php

namespace App\Http\Controllers;

use App\Models\Scout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function main_page()
    {
        return view('Admin.admin_main_page');
    }

    public function add_employee_page($type)
    {
        return view('Admin.new_employee', ['type' => $type]);
    }


    public function add_scout_page()
    {
        return view('Admin.new_scout');
    }


    public function add_new_employee(Request $request, $type)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->assign_date = $request->assign_date;
        $user->password =  Hash::make($request->password);
        if ($type == 'Enterer')
            $user->type = 'Enterer';


        $user->save();


        return redirect()->route('admin_main_page')->withErrors('DONE');
    }

    public function show_employees()
    {

        $enterers = User::all()->where('type', 'Enterer');

        $scouts = Scout::all();

        return view('Admin.display_employees', ['enterers' => $enterers, 'scouts' => $scouts]);
    }



    public function add_new_scout(Request $request)
    {
        $scout = new Scout();
        $scout->full_name = $request->full_name;
        $scout->phone_number = $request->phone_number;
        $scout->assign_date = $request->assign_date;
        $scout->current_address = $request->current_address;

        $scout->save();
        return redirect()->back();
    }

    public function delete_employees($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function delete_scout($id)
    {
        $scout = Scout::find($id);
        $scout->delete();

        return redirect()->back();
    }


    //acount



    public function Show_admin_Info()
    {

        $user = User::find(Auth::id());

        return view('Admin.Account.update_info', ['user' => $user]);
    }

    public function Update_admin_Info(Request $request)
    {
        $user = User::find(Auth::id());

        if (Hash::check($request->password, $user->password)) {

            if ($request->has('name'))
                $user->name = $request->name;
            if ($request->has('email'))
                $user->email = $request->email;


            $user->save();

            return redirect()->back()->withErrors('done');
        } else
            return redirect()->back()->withErrors('wrong password ');
    }


    public function update_admin_password(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('Admin.Account.update_password');
        } else {
            $user = User::find(Auth::id());
            if (Hash::check($request->old_password, $user->password)) {
                $request->validate(
                    [
                        'new_password' => 'required|min:8',
                        'confirm_password' => 'same:new_password'
                    ]

                );

                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->withErrors('done');
            } else {
                return redirect()->back()->withErrors('wrong password ');
            }
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
