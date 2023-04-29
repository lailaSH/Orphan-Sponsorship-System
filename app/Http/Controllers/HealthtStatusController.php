<?php

namespace App\Http\Controllers;

use App\Models\HealthtStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HealthtStatusController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index($flag)
    {
        $status = HealthtStatus::all();
        return view('Admin.site_data.health_status', ['status' => $status, 'flag' => $flag]);
    }



    public function store(Request $request)
    {
        $now = Carbon::now();

        $request->validate(
            [
                'statue' => 'required',
            ],
            [
                'statue.required' => 'عليك إدخال نوع الحالة الصحية'
            ]
        );
        $statue = new HealthtStatus();
        $statue->statue = $request->statue;
        $statue->description = $request->description;
        $statue->notes = $request->notes;
        $statue->adding_date = $now;
        $statue->save();
        return redirect()->back();
    }



    public function destroy($id)
    {
        $statu = HealthtStatus::find($id);
        $statu->delete();
        return redirect()->back();
    }
}
