<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function check()
    {

        if (Auth::user()->type == 'Enterer') {
            return redirect()->route('Enterer_Page');
        } else if (Auth::user()->type == 'Admin') {
            return redirect()->route('admin_main_page');
        } else if (Auth::user()->type == 'Director') {

            return view('Director.director_main_page');
        } else {
            return redirect()->route('mainpage');
        }
    }
}
