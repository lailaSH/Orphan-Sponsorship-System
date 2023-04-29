<?php

namespace App\Http\Controllers;

use App\Models\Basic_Info;
use App\Models\Evaluation;
use App\Models\HomeAsset;
use App\Models\OrphanMore18;
use App\Models\HomeOwnership;
use App\Models\FinancialDepart;
use App\Models\WarrantyRequest;
use App\Models\Orphan;
use App\Models\OrphanHealthStatus;
use App\Models\url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Disclosing_form extends Controller
{
    public function __construct()
    {
        $this->middleware('enterer');
    }
    public function forms($id)
    {
        return view('Enterer.disclosing_form.Edit_all_forms')->with('id', $id);
    }
    ///////basic info
    public  static function validate_basic_info(Request $request)
    {
        $now = Carbon::now();
        $request->validate(
            [
                'family_name' => 'required',
                'mother_name' => 'required',
                'social_stuation' => 'required',
                'father_name' => 'required',
                'death_reason' => 'required',
                'death_date' => 'required|before:' . $now,
                /*'guardian_name' => 'required',
                'guardian_relative_relation' => 'required',*/
                'original_address' => 'required',
                'current_address' => 'required',
                'full_children_number' => 'required',
                'number_of_children_residing_with_the_mother' => 'required',
                'married_children_number' => 'required',
                'married_sons_number_resident' => 'required',
                'married_sons_number_separated' => 'required',
            ],
            [
                'family_name.required' => 'يجب عليك إدخال اسم العائلة',
                'mother_name.required' => 'يجب عليك إدخال اسم الأم',
                'social_stuation.required' => 'يجب عليك إدخال الوضع الاجتماعي للأم',
                'mother_name.required' => 'يجب عليك إدخال اسم الأم',
                'father_name.required' => 'يجب عليك إدخال اسم الأب',
                'death_reason.required' => 'يجب عليك إدخال سبب الوفاة',
                'death_date.required' => 'يجب عليك إدخال تاريخ الوفاة',
                /* 'guardian_name.required' => 'يجب عليك إدخال اسم الوصي',
                'guardian_relative_relation.required' => 'يجب عليك إدخال نوعية صلة القرابة مع الوصي',*/
                'original_address.required' => 'يجب عليك إدخال العنوان الأصلي للوصي',
                'current_address.required' => 'يجب عليك إدخال العنوان الحالي للوصي',
                'full_children_number.required' => 'يجب عليك إدخال عدد الأولاد الكلي',
                'number_of_children_residing_with_the_mother.required' => 'يجب عليك إدخال عدد الأولاد المقيمين مع الأم',
                'married_children_number.required' => 'يجب عليك إدخال عدد الأولاد المتزوجين',
                'married_sons_number_resident.required' => 'يجب عليك إدخال عدد الأولاد المتزوجين المقيمين مع الأم',
                'married_sons_number_separated.required' => '   
                 يجب عليك إدخال عدد الأولاد المتزوجين المنفصلين عن الأم',

                'death_date.before' => 'تاريخ الوفاة يجب أن يكون قبل التاريخ الحالي'

            ]
        );
    }

    public function basic_info_store(Request $request, $wr_id)
    {

        $item = DB::table('basic_infos')->where('warranty_request_id', $wr_id)->first();
        if ($item != null) {
            return redirect()->route('HomeOwnerships', ['wr_id' => $wr_id])->withErrors('لقد قمت بتعبئة فورم المعلومات الاساسية لهذا الطلب ');
        }

        Disclosing_form::validate_basic_info($request);

        $basic_info = new Basic_Info();

        $basic_info->basic_score = 0;

        $basic_info->family_type = $request->family_type;              //here we are save the family type
        if ($request->family_type == "resident") {                         //and sum to score the this criteria 
            $basic_info->basic_score = $basic_info->basic_score + 1;     //effect.
        } else {                                                        //....
            $basic_info->basic_score = $basic_info->basic_score + 2;     //....
        }                                                              //....

        $basic_info->family_name = $request->family_name;
        $basic_info->mother_name = $request->mother_name;


        if ($request->ifWork == 'yes') {                                //here we are know if mother work
            $basic_info->mother_job = $request->mother_job;             //or not and we are save that and
            $basic_info->mother_salary = $request->mother_salary;       //sum to score this criteria effect.
            $basic_info->basic_score = $basic_info->basic_score + 1;    //....
        } else {                                                        //....
            $basic_info->mother_job = null;                         //....
            $basic_info->mother_salary = null;                            //....
            $basic_info->basic_score = $basic_info->basic_score + 2;    //....
        }                                                               //....


        $basic_info->social_stuation = $request->social_stuation;       //here we are save the social stuation
        if ($request->social_stuation == "married") {                     //for mother and we are sum the effect
            $basic_info->basic_score = $basic_info->basic_score + 1;    //of this criteria to the score
        } else if ($request->social_stuation == "widow") {                //....
            $basic_info->basic_score = $basic_info->basic_score + 2;    //....
        } else {                                                         //....
            $basic_info->basic_score = $basic_info->basic_score + 3;    //....
        }                                                               //....

        $basic_info->father_name = $request->father_name;
        $basic_info->death_reason = $request->death_reason;
        $basic_info->death_date = $request->death_date;

        $basic_info->guardian_type = $request->guardian_type;                                  //   
        if ($request->guardian_type == "mother_guardian") {                                    //
            $basic_info->guardian_relative_relation = "الأم";                                   //
            $basic_info->guardian_name = null;                                                 //
            $basic_info->guardian_job = null;                                                  //
            $basic_info->guardian_salary = null;                                               //
            $basic_info->basic_score = $basic_info->basic_score + 1;                           //
        } else {                                                                               //
            $basic_info->guardian_relative_relation = $request->guardian_relative_relation;    //
            $basic_info->guardian_name = $request->guardian_name;                              //
            if ($request->guardian_Work_choice == "yes") {                                     //
                $basic_info->guardian_job = $request->guardian_job;                            //
                $basic_info->guardian_salary = $request->guardian_salary;                      //
            } else {                                                                           //
                $basic_info->guardian_job = null;                                              //
                $basic_info->guardian_salary = null;                                           //
                $basic_info->basic_score = $basic_info->basic_score + 1;                       //
            }                                                                                  //
            $basic_info->basic_score = $basic_info->basic_score + 2;                           //
        }                                                                                      //

        $basic_info->telephone_fix = $request->telephone_fix;
        $basic_info->mobile = $request->mobile;
        $basic_info->original_address = $request->original_address;
        $basic_info->current_address = $request->current_address;
        $basic_info->full_children_number = $request->full_children_number;
        $basic_info->number_of_children_residing_with_the_mother = $request->number_of_children_residing_with_the_mother;
        $basic_info->married_children_number = $request->married_children_number;
        $basic_info->married_sons_number_resident = $request->married_sons_number_resident;
        $basic_info->married_sons_number_separated = $request->married_sons_number_separated;
        $basic_info->warranty_request_id = $wr_id;

        /*if($request->social_stuation == )*/
        $basic_info->save();
        return redirect()->route('HomeOwnerships', $wr_id);
    }
    public function edit_basic_info($wr_id)
    {
        $basic_info = Basic_Info::where('warranty_request_id', $wr_id)->first();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }
        return view('Enterer.disclosing_form.edit_basic_info')->with('basic_info', $basic_info);
    }
    public function update_basic_info(Request $request, $wr_id)
    {

        Disclosing_form::validate_basic_info($request);

        $basic_info = DB::table('basic_infos')->where(
            'warranty_request_id',
            $wr_id
        )->update([
            "family_name" => $request->family_name,
            "mother_name" => $request->mother_name,
            "mother_job" => $request->mother_job,
            "mother_salary" => $request->mother_salary,
            "social_stuation" => $request->social_stuation,
            "father_name" => $request->father_name,
            "death_reason" => $request->death_reason,
            "death_date" => $request->death_date,
            "guardian_name" => $request->guardian_name,
            "guardian_job" => $request->guardian_job,
            "guardian_salary" => $request->guardian_salary,
            "guardian_relative_relation" => $request->guardian_relative_relation,
            "telephone_fix" => $request->telephone_fix,
            "mobile" => $request->mobile,
            "original_address" => $request->original_address,
            "current_address" => $request->current_address,
            "full_children_number" => $request->full_children_number,
            "number_of_children_residing_with_the_mother" => $request->number_of_children_residing_with_the_mother,
            "married_children_number" => $request->married_children_number,
            "married_sons_number_resident" => $request->married_sons_number_resident,
            "married_sons_number_separated" => $request->married_sons_number_separated,
        ]);
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }
    /////homeowner_ship
    public function homeOwnership($wr_id)
    {
        return view('Enterer.disclosing_form.Holder_ship', ['wr_id' => $wr_id]);
    }

    public static function store_homeOwnership_validate(Request $request)
    {
        $request->validate(
            [
                'type_ownerships' => 'required',
                // 'home_owner' => 'required',
                // 'amount_rent' => 'required',
                // 'amount_pay_rent' => 'required',
                // 'participants_in_pay' => 'required',
                'number_room' => 'required',
                'number_people_in_home' => 'required',
                'relative_relation' => 'required'
            ],
            [
                'type_ownerships.required' => 'عليك تحديد نوع ملكية البست',
                // 'type_ownerships.required' => 'يجب عليك إدخال نوع ملكية البيت ',
                // 'home_owner.required' => 'يجب عليك إدخال اسم صاحب البيت',
                // 'amount_rent.required' => 'يجب عليك إدخال مبلغ الأجار',
                // 'amount_pay_rent.required' => 'يجب عليك إدخال المبلغ الذي تدفعه من الإجار ',
                // 'participants_in_pay.required' => 'يجب عليك توضيح المساهمين في دفع الأجار ',
                'number_room.required' => 'يجب عليك إدخال عدد غرف البيت ',
                'number_people_in_home.required' => 'يجب عليك إدخال عدد الأشخاص في البيت ',
                'relative_relation.required' => 'يجب عليك توضيح صلة القرابة للأشخاص المقيمين في البيت ',

            ]
        );
    }


    public function store_homeOwnership(Request $request, $wr_id)
    {

        $item = DB::table('home_ownerships')->where('warranty_request_id', $wr_id)->first();
        if ($item != null) {
            return redirect()->route('financial_departs', ['wr_id' => $wr_id])->withErrors('لقد قمت بتعبئة فورم ملكية لهذا الطلب ');
        }


        Disclosing_form::store_homeOwnership_validate($request);

        $homeOwnership = new HomeOwnership();
        $homeOwnership->warranty_request_id = $wr_id;
        $homeOwnership->ownership_score = 0;
        $homeOwnership->type_ownerships = $request->type_ownerships;
        if ($request->type_ownerships == "rent") {
            $homeOwnership->amount_rent = $request->amount_rent;
            $homeOwnership->amount_pay_rent = $request->amount_pay_rent;


            if ($request->amount_rent <= 100000 && $request->participating_party == "yes") {
                $homeOwnership->participants_in_pay = $request->participants_in_pay;
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 3;
            } else if ($request->amount_rent <= 100000 && $request->participating_party == "no") {
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 4;
            } else if ($request->amount_rent > 100000 && $request->participating_party == "yes") {
                $homeOwnership->participants_in_pay = $request->participants_in_pay;
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 5;
            } else if ($request->amount_rent > 100000 && $request->participating_party == "no") {
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 6;
            }
        } else {
            $homeOwnership->home_owner = $request->home_owner;
            if ($request->type_ownerships == "hosted") {
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 2;
            } else if ($request->type_ownerships == "borrowed") {
                $homeOwnership->ownership_score = $homeOwnership->ownership_score + 1;
            }
        }

        $homeOwnership->number_people_in_home = $request->number_people_in_home;
        if ($request->number_people_in_home <= 2) {
            $homeOwnership->ownership_score = $homeOwnership->ownership_score + 1;
        } else if ($request->number_people_in_home > 2 && $request->number_people_in_home <= 5) {
            $homeOwnership->ownership_score = $homeOwnership->ownership_score + 2;
        } else {
            $homeOwnership->ownership_score = $homeOwnership->ownership_score + 3;
        }

        $homeOwnership->where_from_secure_money = $request->where_from_secure_money;
        $homeOwnership->number_room = $request->number_room;
        $homeOwnership->relative_relation = $request->relative_relation;
        $homeOwnership->save();
        return redirect()->route('financial_departs', $wr_id);
    }

    public function edit_homeOwnership($wr_id)
    {
        $homeOwnership = HomeOwnership::where('warranty_request_id', $wr_id)->first();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }

        return view('Enterer.disclosing_form.edit_homeOwnership')->with('homeOwnership', $homeOwnership);
    }
    public function update_homeOwnership(Request $request, $wr_id)
    {

        Disclosing_form::store_homeOwnership_validate($request);

        $homeOwnership = HomeOwnership::where(
            'warranty_request_id',
            $wr_id
        )->update([
            "type_ownerships" => $request->type_ownerships,
            "home_owner" => $request->home_owner,
            "amount_rent" => $request->amount_rent,
            "amount_pay_rent" => $request->amount_pay_rent,
            "participants_in_pay" => $request->participants_in_pay,
            "where_from_secure_money" => $request->where_from_secure_money,
            "number_room" => $request->number_room,
            "number_people_in_home" => $request->number_people_in_home,
            "relative_relation" => $request->relative_relation,

        ]);
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }

    public static function validate_home_assets(Request $request)
    {
        $request->validate(
            [
                'availablility' => 'required',
                'status' => 'required',
                'source' => 'required',
            ],
            [
                'availablility.required' => 'يجب عليك توضيح مدى توفر المادة',
                'status.required' => 'يجب عليك توضيح حالة المادة',
                'source.required' => 'يجب عليك توضيح مصدر المادة',
            ]
        );
    }

    public function home_assets_store(Request $request, $wr_id)
    {


        $home_assets = new HomeAsset();
        if ($request->element != null) {
            if ($request->another != null) {
                return redirect()->back()->withErrors('تستطيع اختيار إما مادة من القائمة أو تعبئة مادة أخرى وليس كلاهما ');
            }
        }
        $item = DB::table('home_assets')->where('warranty_request_id', $wr_id)->where('element', $request->element)->first();
        if ($item != null) {
            return redirect()->route('house_asset', ['wr_id' => $wr_id])->withErrors($request->element . '   : لقد قمت بإدخال المعلومات سابقا لهذه المادة   ');
        }

        Disclosing_form::validate_home_assets($request);

        if ($request->another != null) {
            $home_assets->element = $request->another;
        }

        if ($request->element != null) {
            $home_assets->element = $request->element;
        }


        $home_assets->availablility = $request->availablility;
        $home_assets->amount = $request->amount;
        $home_assets->status = $request->status;
        $home_assets->source = $request->source;
        $home_assets->notes = $request->notes;
        $home_assets->warranty_request_id = $wr_id; {
        }

        $home_assets->save();
        $message =  $request->element . '  المادة السابقة التي قمت تخزينها هي  ';
        return redirect()->route('house_asset', $wr_id)->withErrors([$message]);
    }
    ///////////////new 
    public function edit_home_assets($r_id)
    {
        $home_assests = DB::table('home_assets')->where('warranty_request_id', $r_id)->get();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }
        return view('Enterer.disclosing_form.edit_home_assets', ['assests' => $home_assests]);
    }
    public function edit_home_asset($id)
    {
        $home_assest = DB::table('home_assets')->where('id', $id)->get()->first();
        return view('Enterer.disclosing_form.edit_home_asset', ['assest' => $home_assest]);
    }
    public function update_home_asset(Request $request, $id)
    {
        Disclosing_form::validate_home_assets($request);
        $element = '';
        if ($request->another != null) {
            $element = $request->another;
        }

        if ($request->element != null) {
            $element = $request->element;
        }
        $home_assets = HomeAsset::where(
            'id',
            $id
        )->update([
            "element" => $element,
            "availablility" => $request->availablility,
            "amount" => $request->amount,
            "status" => $request->status,
            "source" => $request->source,
            "notes" => $request->notes,
        ]);
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }
    //////////////////////

    public static function validate_house_evaluation($request)
    {
        $request->validate(
            [
                'house_evaluation' => 'required',
                'poor_degree' => 'required',
            ],
            [
                'house_evaluation.required' => 'يجب عليك توضيح تقييم المنزل',
                'poor_degree.required' => 'يجب عليك توضيح تقييم درجة الفقر',

            ]
        );
    }


    public function house_evaluation($wr_id)
    {
        return view('Enterer.disclosing_form.house_evaluation', ['wr_id' => $wr_id]);
    }

    public function house_evaluation_store(Request $request, $wr_id)
    {
        if ($item = DB::table('evaluations')->where('warranty_request_id', $wr_id)->first()) {
            return redirect()->route('orphan_less_than_18', [$wr_id, 0])->withErrors('   : لقد قمت بإدخال معلومات تقييم المنزل   ');
        }

        Disclosing_form::validate_house_evaluation($request);


        $ev = new Evaluation();
        $ev->house_evaluation = $request->house_evaluation;
        $ev->poor_degree = $request->poor_degree;
        $ev->evaluations_score = 0;

        if ($request->house_evaluation == "medium") {
            $ev->evaluations_score = $ev->evaluations_score + 2;
        } else if ($request->house_evaluation == "bad") {
            $ev->evaluations_score = $ev->evaluations_score + 4;
        }

        if ($request->poor_degree == "medium") {
            $ev->evaluations_score = $ev->evaluations_score + 2;
        } else if ($request->poor_degree == "bad") {
            $ev->evaluations_score = $ev->evaluations_score + 4;
        }

        $ev->notes = $request->notes;

        $ev->warranty_request_id = $wr_id;
        $ev->save();
        return redirect()->route('orphan_less_than_18', [$wr_id, 0]);
    }
    public function edit_house_evaluation($wr_id)
    {
        $house_evaluation = Evaluation::where('warranty_request_id', $wr_id)->first();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }

        return view('Enterer.disclosing_form.edit_house_evaluation')->with('house_evaluation', $house_evaluation);
    }
    public function update_house_evaluation(Request $request, $wr_id)
    {
        Disclosing_form::validate_house_evaluation($request);

        $Evaluation = Evaluation::where(
            'warranty_request_id',
            $wr_id
        )->update([
            "house_evaluation" => $request->house_evaluation,
            "poor_degree" => $request->poor_degree,
            "notes" => $request->notes,
        ]);
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }
    public function orphan_less_than_18($wr_id, $num)
    {
        $orphans = DB::table('orphans')->where('warranty_request_id', $wr_id);
        $orphans = $orphans->get();
        $c = url::where('id', 1)->get()->first();
        $count = $c->count;
        if (url()->previous() != url()->current() && $count == 0) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
                "count" => 1,

            ]);
        }
        return view('Enterer.disclosing_form.less_than_18_orphans')->with(['orphans' => $orphans, 'wr_id' => $wr_id, 'num' => $num]);
    }
    public function orphan_less_than_18_edit($id, $num)
    {
        $orphan = Orphan::Find($id);
        $health_St = $orphan->health_status;
        return view('Enterer.disclosing_form.edit_less_than_18_orphans')->with(['orphan' => $orphan, 'health_status' => $health_St, 'num' => $num]);
    }
    public function orphan_less_than_18_update(Request $request, $id, $num)
    {

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
        $Orphans = DB::table('orphans')->where(
            'id',
            $id
        )->update([
            'name' => $request->name,
            'class' => $request->class,
            'school' => $request->school,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ]);
        $orphan = Orphan::find($id);
        $orphan->health_status()->attach($request->statue);
        $orphans = DB::table('orphans')->where('warranty_request_id', $orphan->warranty_request_id);
        $orphans = $orphans->get();
        return redirect()->route('orphan_less_than_18', [$orphan->warranty_request_id, $num]);
    }

    public static function validate_more_18(Request $request)
    {
        $limit = 17;
        $request->validate(
            [
                'name' => 'required',
                'certificate' => 'required',
                'desire_to_work' => 'required',
                'age' => 'required',
            ],
            [
                'name.required' => 'عليك إدخال اسم اليتيم',
                'certificate.required' => 'عليك إدخال الشهادة الدراسة',
                'desire_to_work.required' => 'عليك توضيح رغبة اليتيم بالعمل',
                'age.required' => 'عليك إدخال عمر اليتيم',
            ]
        );
    }


    public function orphan_more_than_18_store(Request $request, $wr_id, $num)
    {


        $item = DB::table('orphan_more18s')->where('warranty_request_id', $wr_id)->where('name', $request->name)->where('age', $request->age)->where('certificate', $request->certificate)->where('desire_to_work', $request->desire_to_work)
            ->first();
        if ($item != null) {
            return redirect()->route('orphanMore18', [$wr_id, $num])->withErrors(
                '   لقد قمت بإدخال معلومات ' . $request->name . ' سابقا   '

            );
        }


        Disclosing_form::validate_more_18($request);
        $orphans = new OrphanMore18();

        $orphans->name = $request->name;
        $orphans->age = $request->age;
        $orphans->certificate = $request->certificate;
        $orphans->desire_to_work = $request->desire_to_work;
        $orphans->notes = $request->notes;
        $orphans->warranty_request_id = $wr_id;
        $orphans->save();

        $message =   '  اليتيم السابق الذي قمت بتخزينه  ' . $request->name;
        return redirect()->route('orphanMore18', [$wr_id, $num])->withErrors($message);
    }
    ///////////////////new 
    public function list_orphan_more_than_18(Request $request, $wr_id)
    {
        $orphans = OrphanMore18::where('warranty_request_id', $wr_id)->get();
        $checkPath = url::where('id', 1)->get()->first();
        if (url()->previous() != url()->current() && $checkPath->count == 0) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
            $url = url::where(
                'id',
                1
            )->update([
                "count" => 0,
            ]);
        }
        return view('Enterer.disclosing_form.list_orphanMoreThan18')->with(['orphans' => $orphans, 'wr_id' => $wr_id]);
    }
    public function orphan_more_than_18_edit($id)
    {
        $orphan = OrphanMore18::where('id', $id)->get()->first();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                2
            )->update([
                "path" => url()->previous(),
            ]);
            $url = url::where(
                'id',
                1
            )->update([
                "count" => 1,
            ]);
        }
        return view('Enterer.disclosing_form.edit_orphanMoreThan18')->with('orphan', $orphan);
    }
    public function orphan_more_than_18_update(Request $request, $id)
    {
        Disclosing_form::validate_more_18($request);

        $orphan = OrphanMore18::where(
            'id',
            $id
        )->update([
            "name" => $request->name,
            "age" => $request->age,
            "certificate" => $request->certificate,
            "desire_to_work" => $request->desire_to_work,
            "notes" => $request->notes,
        ]);
        $url = url::where('id', '2')->get()->first();
        $path = $url->path;
        return redirect()->to($path);
    }


    ///////////////////////

    public function financial_departs($wr_id)
    {
        return view('Enterer.disclosing_form.financial_departs', ['wr_id' => $wr_id]);
    }

    public static function financial_departs_validate(Request $request)
    {
        $request->validate(
            [
                'BeneficiaryOf_UN' => 'required',
                'RetirementSalary' => 'required',
                'NumberWorkersInFamily' => 'required',
                'NumberOfPeopleExpensesMotherTakesCareOf' => 'required',
                'MotherMasteredJob' => 'required',
                'NumberChildrenTravels' => 'required',
                'WhereToGetHelp' => 'required',
                'OtherAffiliatedAssociations' => 'required',
                'ChildrensSponsoredByAnotherAssociation' => 'required',
                'ProjectProposal' => 'required'
            ],
            [
                'BeneficiaryOf_UN.required' => 'عليك توضيح ما إذا كانت تستفيد من الأنوروا أم لا',
                'RetirementSalary.required' => 'عليك تحديد اذا كان يوجد راتب تقاعدي',
                'NumberOfPeopleExpensesMotherTakesCareOf.required' => 'عليك تحديد عدد الأشخاص الذين تتكفل الأم بمصروفهم غير أولادها الأم',
                'WhereToGetHelp.required' => 'عليك توضيح من أين تستلم الأسرة مؤونتها',
                'NumberChildrenTravels.required' => 'عليك تحديد عدد الأولاد المسافرين',
                'OtherAffiliatedAssociations.required' => 'عليك تحديد فيما إذا كانت الأسرة قد انتسبت إلى جمعيات أخرى',
                'MotherMasteredJob.required' => 'عليك تحديد فيما إذا كانت الأم تتقن مهنة أم لا',
                'NumberWorkersInFamily.required' => 'عليك تحديد عدد الأولاد العاملين في الأسرة',
                'ChildrensSponsoredByAnotherAssociation.required' => 'عليك تحديد عدد اللأولاد المكفولين بجمعية أخرى',
                'ProjectProposal.required' => 'عليك توضيح ماإذا كان هنالك اقتراح بتأسيس مشروع ما'

            ]
        );
    }


    public function financial_departs_store(Request $request, $wr_id)
    {

        $item = DB::table('financial_departs')->where('warranty_request_id', $wr_id)->first();
        if ($item != null) {
            return redirect()->route('house_asset', ['wr_id' => $wr_id])->withErrors('لقد قمت بتعبئة فورم القسم المادي سابقا لهذا الطلب ');
        }

        Disclosing_form::financial_departs_validate($request);

        $FinancialDepart = new FinancialDepart();
        $FinancialDepart->warranty_request_id = $wr_id;
        $FinancialDepart->financial_score = 0;

        if ($request->expense_help == "no") {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
            $FinancialDepart->MoneyFromParents = "false";
            $FinancialDepart->AmountOfParents = -1;
            $FinancialDepart->MoneyFromRelatives = "false";
            $FinancialDepart->AmountOfRelatives = -1;
            $FinancialDepart->MoneyFromManGood = "false";
            $FinancialDepart->AmountOfManGood = -1;
        } else {
            if (in_array('1', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromParents = "true";
                $FinancialDepart->AmountOfParents = $request->AmountOfParents;
            } else if (!in_array('1', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromParents = "false";
                $FinancialDepart->AmountOfParents = -1;
            }
            if (in_array('2', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromRelatives = "true";
                $FinancialDepart->AmountOfRelatives = $request->AmountOfRelatives;
            } else if (!in_array('2', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromRelatives = "false";
                $FinancialDepart->AmountOfRelatives = -1;
            }
            if (in_array('3', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromManGood = "true";
                $FinancialDepart->AmountOfManGood = $request->AmountOfManGood;
            } else if (!in_array('3', $request->get('hobby'))) {
                $FinancialDepart->MoneyFromManGood = "false";
                $FinancialDepart->AmountOfManGood = -1;
            }
        }



        $FinancialDepart->WhereToGetHelp = $request->WhereToGetHelp;
        $FinancialDepart->LastDateOfReceipt = $request->LastDateOfReceipt;
        $FinancialDepart->OtherAffiliatedAssociations = $request->OtherAffiliatedAssociations;

        $FinancialDepart->ChildrensSponsoredByAnotherAssociation = $request->ChildrensSponsoredByAnotherAssociation;
        if ($request->ChildrensSponsoredByAnotherAssociation == 0) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
        }

        $FinancialDepart->AmountEachChild = $request->AmountEachChild;
        $FinancialDepart->BeneficiaryOf_UN = $request->BeneficiaryOf_UN;
        $FinancialDepart->NumberOfBeneficiaries = $request->NumberOfBeneficiaries;

        if ($request->NumberOfBeneficiaries == null) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
        }

        $FinancialDepart->LastAmountReceivedFrom_UN_ForEachPerson = $request->LastAmountReceivedFrom_UN_ForEachPerson;
        $FinancialDepart->TotalAmountUN = $request->TotalAmountUN;
        $FinancialDepart->RetirementSalary = $request->RetirementSalary;

        $FinancialDepart->AmountRetirementSalary = $request->AmountRetirementSalary;
        if ($request->AmountRetirementSalary == null) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
        }

        $FinancialDepart->NumberWorkersInFamily = $request->NumberWorkersInFamily;
        if ($request->NumberWorkersInFamily == 0) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
        }

        $FinancialDepart->EveryoneSalary = $request->EveryoneSalary;

        $FinancialDepart->NumberOfPeopleExpensesMotherTakesCareOf = $request->NumberOfPeopleExpensesMotherTakesCareOf;
        if ($request->NumberOfPeopleExpensesMotherTakesCareOf > 0) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + $request->NumberOfPeopleExpensesMotherTakesCareOf;
        }

        $FinancialDepart->RelativeRelation = $request->RelativeRelation;
        $FinancialDepart->Reason = $request->Reason;
        $FinancialDepart->MotherMasteredJob = $request->MotherMasteredJob;
        $FinancialDepart->job = $request->job;
        $FinancialDepart->ProjectProposal = $request->ProjectProposal;
        $FinancialDepart->Project = $request->Project;
        $FinancialDepart->ExpectedCostProject = $request->ExpectedCostProject;

        $FinancialDepart->NumberChildrenTravels = $request->NumberChildrenTravels;
        if ($request->NumberChildrenTravels == 0) {
            $FinancialDepart->financial_score = $FinancialDepart->financial_score + 1;
        }

        $FinancialDepart->MonthlyAmount = $request->MonthlyAmount;
        $FinancialDepart->save();

        return redirect()->route('house_asset', $wr_id);
    }
    public function edit_financial_departs($wr_id)
    {
        $financial_departs = FinancialDepart::where('warranty_request_id', $wr_id)->first();
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }
        return view('Enterer.disclosing_form.edit_financial_departs')->with(['financial_departs' => $financial_departs]);
    }

    public function  update_financial_departs(Request $request, $wr_id)
    {

        Disclosing_form::financial_departs_validate($request);
        $financial_departs = FinancialDepart::where(
            'warranty_request_id',
            $wr_id
        )->update([
            "MoneyFromParents" => $request->MoneyFromParents,
            "MoneyFromRelatives" => $request->MoneyFromRelatives,
            "AmountOfParents" => $request->AmountOfParents,
            "AmountOfRelatives" => $request->AmountOfRelatives,
            "AmountOfManGood" => $request->AmountOfManGood,
            "WhereToGetHelp" => $request->WhereToGetHelp,
            "LastDateOfReceipt" => $request->LastDateOfReceipt,
            "OtherAffiliatedAssociations" => $request->OtherAffiliatedAssociations,
            "ChildrensSponsoredByAnotherAssociation" => $request->ChildrensSponsoredByAnotherAssociation,
            "AmountEachChild" => $request->AmountEachChild,
            "BeneficiaryOf_UN" => $request->BeneficiaryOf_UN,
            "NumberOfBeneficiaries" => $request->NumberOfBeneficiaries,
            "LastAmountReceivedFrom_UN_ForEachPerson" => $request->LastAmountReceivedFrom_UN_ForEachPerson,
            "TotalAmountUN" => $request->TotalAmountUN,
            "RetirementSalary" => $request->RetirementSalary,
            "AmountRetirementSalary" => $request->AmountRetirementSalary,
            "NumberWorkersInFamily" => $request->NumberWorkersInFamily,
            "EveryoneSalary" => $request->EveryoneSalary,
            "NumberOfPeopleExpensesMotherTakesCareOf" => $request->NumberOfPeopleExpensesMotherTakesCareOf,
            "RelativeRelation" => $request->RelativeRelation,
            "Reason" => $request->Reason,
            "MotherMasteredJob" => $request->MotherMasteredJob,
            "job" => $request->job,
            "ProjectProposal" => $request->ProjectProposal,
            "Project" => $request->Project,
            "ExpectedCostProject" => $request->ExpectedCostProject,
            "NumberChildrenTravels" => $request->NumberChildrenTravels,
            "MonthlyAmount" => $request->MonthlyAmount,
        ]);
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }
    public function saved_successfully($id)
    {
        $request = WarrantyRequest::find($id);
        $request->status = "waiting_for_processing";
        $request->save();
        return view('Enterer.disclosing_form.after_fill');
    }


    public function delete_all_parts($w_id)
    {
        $request = WarrantyRequest::find($w_id);
        if ($request->basic_info != null) {
            $basic = Basic_Info::find($request->basic_info->id);
            $basic->delete();
        }
        if ($request->HomeOwnership != null) {
            $homeOwnership = HomeOwnership::find($request->HomeOwnership->id);
            $homeOwnership->delete();
        }

        if ($request->financial_departs != null) {
            $financial_departs = FinancialDepart::find($request->financial_departs->id);
            $financial_departs->delete();
        }
        if ($request->evaluation != null) {
            $evaluation = Evaluation::find($request->evaluation->id);
            $evaluation->delete();
        }
        if ($request->homeassets != null) {
            foreach ($request->homeassets as $assest) {
                $assest->delete();
            }
        }
        if ($request->orphanmore18s != null) {
            foreach ($request->orphanmore18s as $orphan) {
                $orphan->delete();
            }
        }

        return redirect()->route('enter_warranty_request_id_for_confirm');
    }
    public function edit_forms($wr_id)
    {
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }
        return route('edit_forms', 'wr_id', $wr_id);
    }
}
