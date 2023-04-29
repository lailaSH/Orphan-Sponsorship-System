<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntererController extends Controller
{

    public function __construct()
    {
        $this->middleware('enterer');
    }
    public function show()
    { 
        $url = url::where(
        'id',
        1
    )->update([
        "path" => ' ',
        "count"=>0
    ]);
    $url = url::where(
        'id',
        2
    )->update([
        "path" => ' ',
        "count"=>0
    ]);     return view('Enterer.Enterer_main_page');
    }

    public function Show_Enterer_Info()
    {

        $user = User::find(Auth::id());

        return view('Enterer.Account.update_info', ['user' => $user]);
    }

    public function Update_Enterer_Info(Request $request)
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


    public function update_Enterer_password(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('Enterer.Account.update_password');
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


    public function store(Request $request)
    {
        //
    }



    public function destroy()
    {
        //
    }
}
