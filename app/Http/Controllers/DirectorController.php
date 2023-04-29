<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\Health_Help;
use APP\Models\donor;
use App\Models\HomeAsset;
use App\Models\User;
use App\Models\WarrantyRequest;
use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DateTime;

class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('director');
    }

    public function display_requests()
    {
        $requests = WarrantyRequest::all()->where('status', 'waiting_for_processing');
        return view('Director.waiting_processing_requests', ['requests' => $requests]);
    }
    public function display_request($id)
    {
        $request = WarrantyRequest::find($id);
        return view('Director.display_request', ['request' => $request]);
    }

    public function display_basic_info($r_id)
    {
        $basic_info = DB::table('basic_infos')->where('warranty_request_id', $r_id)->first();
        return view('Director.parts.basic_info', ['info' => $basic_info, 'r_id' => $r_id]);
    }

    public function display_home_assets($r_id)
    {
        $home_assests = DB::table('home_assets')->where('warranty_request_id', $r_id)->get();
        $evaluation = DB::table('evaluations')->where('warranty_request_id', $r_id)->first();
        return view('Director.parts.home_assests', ['assests' => $home_assests, 'eva' => $evaluation, 'r_id' => $r_id]);
    }

    public function display_orphans_more_than_18($r_id)
    {
        $orphans = DB::table('orphan_more18s')->where('warranty_request_id', $r_id)->get();
        return view('Director.parts.orphans_more_than_18', ['orphans' => $orphans, 'r_id' => $r_id]);
    }

    public function display_financial_departs($r_id)
    {
        $financial_departs = DB::table('financial_departs')->where('warranty_request_id', $r_id)->get()->first();
        return view('Director.parts.financial_departs', ['financial_departs' => $financial_departs, 'r_id' => $r_id]);
    }

    public function display_home_ownership($r_id)
    {
        $ownership = DB::table('home_ownerships')->where('warranty_request_id', $r_id)->get()->first();
        return view('Director.parts.home_ownership', ['ownership' => $ownership, 'r_id' => $r_id]);
    }
    public function display_orphan_less_than_18($r_id)
    {
        $orphans = DB::table('orphans')->where('warranty_request_id', $r_id);
        $orphans = $orphans->get();
        return view('Director.parts.orphans')->with(['orphans' => $orphans, 'r_id' => $r_id]);
    }



    public function approve_request($r_id)
    {
        $warrenty_request = WarrantyRequest::find($r_id);
        $warrenty_request->status = "approved";
        $warrenty_request->reason = "فارغ";
        $warrenty_request->save();
        return redirect()->route('display_waiting_requests');
    }

    public function reject_request($r_id, Request $request)
    {
        $warrenty_request = WarrantyRequest::find($r_id);
        $warrenty_request->status = "rejected";
        $warrenty_request->reason = $request->reason;
        $warrenty_request->save();
        return redirect()->route('display_waiting_requests');
    }


    public function OnHold_request($r_id, Request $request)
    {
        $warrenty_request = WarrantyRequest::find($r_id);
        $warrenty_request->status = "OnHold";
        $warrenty_request->reason = $request->reason;
        $warrenty_request->save();
        return redirect()->route('display_waiting_requests');
    }


    public function approved_requests_archives($rank)
    {

        if ($rank == 2) {

            $requests = WarrantyRequest::all()->where('status', 'approved');

            return view('Director.requests.approved', ['approved' => $requests]);
        }

        $requests = WarrantyRequest::all()->sortByDesc('created_at')->where('status', 'approved');

        return view('Director.requests.approved', ['approved' => $requests]);
    }

    public function rejected_requests_archives($rank)
    {

        if ($rank == 2) {

            $requests = WarrantyRequest::all()->where('status', 'rejected');

            return view('Director.requests.rejected', ['rejected' => $requests]);
        }


        $requests = WarrantyRequest::all()->sortByDesc('created_at')->where('status', 'rejected');

        return view('Director.requests.rejected', ['rejected' => $requests]);
    }
    //account


    public function Show_director_Info()
    {

        $user = User::find(Auth::id());

        return view('Director.Account_d.update_info', ['user' => $user]);
    }

    public function Update_director_Info(Request $request)
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
            return redirect()->back()->withErrors('كلمة سر خاطئة ');
    }


    public function update_director_password(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('Director.Account_d.update_password');
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
    //reports
    public function health_report()
    {


        $cost_1 = 0;
        $cost_2 = 0;
        $cost_3 = 0;
        $cost_4 = 0;
        $cost_5 = 0;
        $i1 = 0;
        $i2 = 0;
        $i3 = 0;
        $i4 = 0;
        $i5 = 0;
        $now = Carbon::now();
        $helps = Health_Help::all();
        foreach ($helps as $help) {
            $d1 = new DateTime($help->date);
            $d2 = new DateTime($now);

            $interval = $d1->diff($d2);
            $diffInMonths  = $interval->m;
            $diffInYear = $interval->y;

            if ($diffInMonths == 0 && $diffInYear == 0) {
                if ($help->type == 'معاينات') {
                    $cost_1 += $help->cost;
                    $i1++;
                }
                if ($help->type == 'تحاليل') {
                    $cost_2 += $help->cost;
                    $i2++;
                }
                if ($help->type == 'أشعة') {
                    $cost_3 += $help->cost;
                    $i3++;
                }
                if ($help->type == 'وصفات طبية') {
                    $cost_4 += $help->cost;
                    $i4++;
                }
                if ($help->type == 'معالجات سنية') {

                    $i5++;
                    $cost_5 += $help->cost;
                }
            }
        }
        return view('Director.report.health', [
            'cost_1' => $cost_1, 'cost_2' => $cost_2,
            'cost_3' => $cost_3, 'cost_4' => $cost_4, 'cost_5' => $cost_5,
            'i1' => $i1, 'i2' => $i2, 'i3' => $i3, 'i4' => $i4, 'i5' => $i5,



        ]);
    }

    public function orphans_report()
    {

        $new_wr_count = 0;
        $new_orphans_count = 0;
        $all_orphans_count = 0;
        $sponsored_orphans = 0;
        $un_sponsored_orphans = 0;
        $orphans_count = 0;

        $Resident_count = 0;
        $displaced_count = 0;
        $orphans_count_arr = null;
        $now = Carbon::now()->format('M');
        $years = Carbon::now()->format('Y');
        $wrs = WarrantyRequest::all();
        $orphans = Orphan::all();

        foreach ($wrs as $wr) {

            $orphans_count = 0;
            $type = DB::table('basic_infos')->where('warranty_request_id', $wr->id)->get(['family_type'])->first();
            if ($type == 'resident') {
                $Resident_count++;
            } else {
                $displaced_count++;
            }
            $d1 = Carbon::parse($wr->created_at)->format('M');
            $d2 = Carbon::parse($wr->created_at)->format('Y');

            if ($d1 == $now && $d2 == $years) {
                $new_orphans_count++;
                $new_wr_count++;
                foreach ($orphans as $orphan) {
                    if ($orphan->warranty_request_id == $wr->id) {
                        $orphans_count++;
                    }
                }
                $orphans_count_arr = Arr::add($orphans_count_arr, $wr->id, $orphans_count);
            }
        }

        foreach ($orphans as $orph) {
            $all_orphans_count++;
            if ($orph->status == 'not_guaranteed') {
                $un_sponsored_orphans++;
            } else {
                $sponsored_orphans++;
            }
        }

        return view('Director.report.orphans', [
            'new_wr_count' => $new_wr_count,
            'new_orphans_count' => $new_orphans_count,
            'Resident_count' => $Resident_count,
            'displaced_count' => $displaced_count,
            'orphans_count_arr' => $orphans_count_arr,
            'all_orphans_count' => $all_orphans_count,
            'un_sponsored_orphans' => $un_sponsored_orphans,
            'sponsored_orphans' => $sponsored_orphans,
        ]);
    }

    public function show_summery()
    {
        $users = DB::table('users')->where('type', 'Enterer')->get();
        $scouts = DB::table('scouts')->get();
        return view('Director.display_employees', ['users' => $users, 'scouts' => $scouts]);
    }

    public function display_Enterer_summery($e_id)
    {
        $user = DB::table('users')->where('id', $e_id)->get()->first();

        return view('Director.summery.display_summery', ['user' => $user]);
    }

    public function display_scout_summery($s_id)
    {
        $scout = DB::table('scouts')->where('id', $s_id)->get()->first();

        return view('Director.summery.display_summery', ['scout' => $scout]);
    }
}
