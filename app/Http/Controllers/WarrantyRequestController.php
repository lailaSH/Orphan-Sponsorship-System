<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\WarrantyRequest;
use Illuminate\Http\Request;
use App\Models\url;
use WarrantyRequest as GlobalWarrantyRequest;
use Carbon\Carbon;
use App\Models\Scout;
use Illuminate\Support\Facades\DB;


class WarrantyRequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('enterer');
    }

    public function show()
    {
        return view('Enterer.warranty_request');
    }


    public function orphan_store_page($wr_id,$num)
    {
        $c=url::where('id',2)->get()->first();
        $count=$c->count;
        if (url()->previous() != url()->current()&&$count==0) {
            $url = url::where(
                'id',
                2
            )->update([
                "path" => url()->previous(),
                "count" =>1,

            ]);
        }
        return view('Enterer.fill_orphan_info')->with(['wr_id' => $wr_id, 'count' => 0,'num'=>$num]);
    }

    public function store(Request $request)
    {

        $now = Carbon::now();
        $request->validate(
            [
                'orphan_guardian' => 'required',
                'relationship' => 'required',
                'birthday' => 'required|before:' . $now,
                'certificate' => 'required',
                'work' => 'required',
                'death_husband_name' => 'required',
                'death_husband_date' => 'required|before:' . $now,
                'death_husband_work' => 'required',
                'death_husband_salary' => 'required',
                'house' => 'required',
                'house_status' => 'required',
                'address' => 'required',
                'phone_num' => 'required',
                'mobile_num' => 'required',
                'applicant_name' => 'required',
            ],
            [
                'orphan_guardian.required' => 'يجب عليك إدخال اسم الوصي',
                'relationship.required' => 'يجب عليك إدخال نوع العلاقة مع الوصي',
                'birthday.required' => 'يجب عليك إدخال تارخ ميلاد الوصي',
                'birthday.before' => 'تاريخ ميلاد الوصي يجب أن يكون قبل التاريخ الحالي ',
                'certificate.required' => 'يجب عليك إدخال الشهادة التعليمية الذي يحملها الوصي',
                'work.required' => 'يجب عليك إدخال عمل الوصي',
                'death_husband_date.required' => 'يجب عليك إدخال تاريخ وفاة الزوج',
                'death_husband_date.before' => 'تاريخ وفاة الزوج يجب أن يكون قبل التاريخ الحالي',
                'death_husband_name.required' => 'يجب عليك إدخال اسم الزوج المتوفي',
                'death_husband_work.required' => 'يجب عليك إدخال عمل الزوج المتوفي',
                'death_husband_salary.required' => 'يجب عليك إدخال راتب الزوج المتوفي ',
                'house.required' => 'يجب عليك إدخال نوع ملكية المنزل',
                'house_status.required' => 'يجب عليك إدخال حالة المنزل',
                'phone_num.required' => 'يجب عليك إدخال رقم الهاتف الأرضي',
                'mobile_num.required' => 'يجب عليك إدخال رقم الموبايل',
                'applicant_name.required' => 'يجب عليك إدخال الاسم الكامل لمقدم الطلب',
            ]
        );

        $warranty_Request = new WarrantyRequest();
        $warranty_Request->orphan_guardian = $request->orphan_guardian;
        $warranty_Request->relationship = $request->relationship;
        $warranty_Request->birthday = $request->birthday;
        $warranty_Request->certificate = $request->certificate;
        $warranty_Request->work = $request->work;
        $warranty_Request->death_husband_name = $request->death_husband_name;
        $warranty_Request->death_husband_date = $request->death_husband_date;
        $warranty_Request->death_husband_work = $request->death_husband_work;
        $warranty_Request->death_husband_salary = $request->death_husband_salary;
        $warranty_Request->house = $request->house;
        $warranty_Request->house_status = $request->house_status;
        $warranty_Request->address = $request->address;
        $warranty_Request->phone_num = $request->phone_num;
        $warranty_Request->mobile_num = $request->mobile_num;
        $warranty_Request->applicant_name = $request->applicant_name;
        $warranty_Request->comment = $request->comment;
        $warranty_Request->save();
        $warranty_Request->health_status()->attach($request->statue);
        return redirect()->route('orphan_store_page', ['wr_id' => $warranty_Request->id,'num'=>0]);
    }


    public function orphan_store(Request $request, $wr_id,$num)
    {


        $item = DB::table('orphans')->where('warranty_request_id', $wr_id)->where('name', $request->name)->where('birth_date', $request->birth_date)->where('class', $request->class)->first();
        if ($item != null) {
            return redirect()->route('orphan_store_page', [$wr_id,$num])->withErrors(
                '   لقد قمت بإدخال معلومات هذا اليتيم سابقا   ' .
                    $request->name
            );
        }

        $now = Carbon::now();
        $request->validate(
            [
                'name' => 'required',
                'class' => 'required',
                'birth_date' => 'required|before:' . $now,
                'gender' => 'required'
            ],

            [
                'name.required' => 'عليك إدخال الاسم الكامل لليتيم',
                'class.required' => 'عليك إدخال الصف الدراسي لليتيم',
                'birth_date.required' => 'عليك إدخال  تاريخ ميلاد اليتيم',
                'birth_date.before' => 'تاريخ ميلاد اليتيم يجب أن يكون قبل التاريخ الحالي',
            ]
        );

        //calaculate the age in years : 
        $dateOfBirth = $request->birth_date;
        $age = Carbon::parse($dateOfBirth)->age;
        ///////////////////////////////////////////////////

        $orphan = new Orphan();
        $orphan->name = $request->name;
        $orphan->class = $request->class;
        $orphan->birth_date = $request->birth_date;
        $orphan->warranty_request_id = $wr_id;
        $orphan->gender = $request->gender;
        $orphan->age = $age;
        $orphan->health_score = 0;
        foreach ($request->statue as $statue) {
            if($statue == 1){
                $orphan->health_score = $orphan->health_score + 5;
            } else if($statue == 2){
                $orphan->health_score = $orphan->health_score + 2;
            } else if($statue == 3) {
                $orphan->health_score = $orphan->health_score + 7;
            }
        }
        
        $orphan->save();
        $orphan->health_status()->attach($request->statue);
        
        return view('Enterer.fill_orphan_info', ['wr_id' => $wr_id, 'count' => 1,'num'=>$num]);
    }
    //after we have finished the process of filling the all the request info
    public function finish($id,$num)
    {
        if($num==0)
        return view('Enterer.after_fill', ['id' => $id]);
        else if($num==1)
        {    $url = url::all()->first();
            $path = $url->path;
            $refresh = url::where(
                'id',
                1
            )->update([
                "path" => "",
                "count" => 0,

            ]);
            return redirect()->to($path);
        }
        else  if($num==2){
            $url = url::where('id',2)->get()->first();
            $path = $url->path;
            $refresh = url::where(
                'id',
                2
            )->update([
                "path" => "",
                "count" => 0,

            ]);
            
            return redirect()->to($path);
        }}

    public function index()
    {
        $requests = WarrantyRequest::all()->where('status', 'none');
        return view('Enterer.general_requests', ['requests' => $requests]);
    }


    public function index_onhold()
    {
        $requests = WarrantyRequest::all()->where('status', 'OnHold');
        return view('Enterer.OnHold_requests', ['requests' => $requests]);
    }


    public function display($id)
    {
        $request = WarrantyRequest::find($id);
        return view('Enterer.display_request_info', ['request' => $request]);
    }

    public function confirm(Request $request)
    {
        $w_request = WarrantyRequest::find($request->request_id);
        if ($w_request == null) {
            return redirect()->back()->withErrors(' لا يوجد طلب يقابل الرقم الذي أدخلته ');
        } else if ($w_request->status == "waiting to be revealed") {
            $scout = Scout::find($w_request->scout);
            return view('Enterer.confirmation', ['request' => $w_request, 'scout' => $scout, 'point' => 1]);
        } else if ($w_request->status == "OnHold") {
            return redirect()->back()->withErrors(' الطلب في انتظار إعادة الكشف ');
        } else if ($w_request->status == "waiting_for_correcting") {
            return redirect()->back()->withErrors('الطلب في انتظار إعادة التصحيح ');
        } else if ($w_request->status == "waiting_for_processing") {
            return redirect()->back()->withErrors('الطلب في انتظار المراجعة من قبل المدير ');
        } else {
            return redirect()->back()->withErrors(' أدخلت رقم غير مناسب ');
        }
    }


    public function confirm_onhold(Request $request)
    {
        $w_request = WarrantyRequest::find($request->request_id);
        if ($w_request == null) {
            return redirect()->back()->withErrors(' لا يوجد طلب يقابل الرقم الذي أدخلته ');
        } else if ($w_request->status == "waiting_for_correcting") {
            $scout1 = Scout::find($w_request->scout);
            $scout2 = Scout::find($w_request->scout_OnHold);
            return view('Enterer.disclosing_form.correct', ['request' => $w_request, 'scout1' => $scout1, 'scout2' => $scout2, 'point' => 1]);
        } else {
            return redirect()->back()->withErrors(' أدخلت رقم غير مناسب ');
        }
    }





    public function destroy($id)
    {
        $request = WarrantyRequest::find($id);
        $request->delete();
        return redirect()->back();
    }
}
