<?php

namespace App\Http\Controllers;

use App\Models\donor;
use App\Models\donor_orphan;
use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



class DonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('enterer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('Enterer.disclosing_form.Add_donor');
    }

    public function ranking_orphan()
    {
        $warranty_request = DB::table('warrantyrequests')->where('status', 'approved')->get(['id'])->toArray();

        $warranty_request_scores_array = null;
        foreach ($warranty_request as $wr) {
            $home_ownerships = DB::table('home_ownerships')->where('warranty_request_id', $wr->id)->get(['ownership_score'])->first();
            $basic_infos = DB::table('basic_infos')->where('warranty_request_id', $wr->id)->get(['basic_score'])->first();
            $financial_departs = DB::table('financial_departs')->where('warranty_request_id', $wr->id)->get(['financial_score'])->first();
            $evaluations = DB::table('evaluations')->where('warranty_request_id', $wr->id)->get(['evaluations_score'])->first();
         if($home_ownerships!=null)
            $score = $home_ownerships->ownership_score + $basic_infos->basic_score + $financial_departs->financial_score + $evaluations->evaluations_score;
            $warranty_request_scores_array = Arr::add($warranty_request_scores_array, $wr->id, $score);
            $score = 0;
        }
        $sorted=null;
        if($warranty_request_scores_array != null)
        $sorted = Arr::sortRecursive($warranty_request_scores_array);
        $orphan_sorted = null;
        $i2 = 0;
        if( $sorted!=null){
        foreach($sorted as $sorte_wr){
            $key = array_search($sorte_wr, $sorted);
                        $orphans = DB::table('orphans')->where('warranty_request_id', $key)->orderBy('health_score', 'desc')->get();

            $orphans = DB::table('orphans')->where('warranty_request_id', $key)->orderBy('health_score', 'desc')->get();
            for($i=0 ; $i<count($orphans); $i++){
                if($orphans[$i]->status == 'not_guaranteed'){
                    $orphan_sorted[$i2] = $orphans[$i]->id;
                    $i2++;
                }
                
            }
        }
    }
        return ($orphan_sorted);
    }

    public function showOrphan($num)
    {
        
        $check = 0;
        $orphans = $this->ranking_orphan();
        if($orphans!=null)
        if ($num < count($orphans)) {
            $Orphans = Orphan::where('id', $orphans[$num])->first();
            $checkOrphan = $Orphans->status;
            if ($checkOrphan == 'مكفول') {
                $check = 1;
            }
            $health_St = $Orphans->health_status;
            return view('Enterer.disclosing_form.showOrphan')->with(['Orphans' => $Orphans, 'num' => $num, 'health_St' => $health_St, 'check' => $check]);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function Add_OrphanToDonor($orphan_id, $num)
    {
        $Donor = DB::table('donors')->orderBy('id', 'desc')->first();
        $donor_id = $Donor->id;
        $donor_orphan = new donor_orphan();
        $donor_orphan->orphan_id = $orphan_id;
        $donor_orphan->donor_id = $donor_id;
        $donor_orphan->save();
        $donor = donor::where('id', $donor_id)->first();
        $number_orphans = $donor->number_orphans;
        $Donor = donor::where('id', $donor_id)->update(['number_orphans' => $number_orphans + 1,]);
        $Orphans = DB::table('orphans')->where(
            'id',
            $orphan_id
        )->update([
            'status' => 'مكفول',
        ]);
        return redirect()->route('showOrphan', $num + 1);
    }

    public function del_OrphanToDonor($orphan_id, $num)
    {
        $donor_orphan = donor_orphan::where('orphan_id', $orphan_id)->first();
        $Donor = DB::table('donors')->orderBy('id', 'desc')->first();
        $donor_id = $Donor->id;
        $donor = donor::where('id', $donor_id)->first();
        $number_orphans = $donor->number_orphans;
        $Donor = donor::where('id', $donor_id)->update(['number_orphans' => $number_orphans - 1,]);
        $donor_orphan->delete();

        $Orphan = DB::table('orphans')->where(
            'id',
            $orphan_id
        )->update([
            'status' => 'not_guaranteed',
        ]);
        return redirect()->route('showOrphan', $num);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'work' => 'required',
                'period' => 'required',
                'start_date' => 'required',
                'Residence_place' => 'required',
                'number_phone' => 'required',
                'password' => 'required',

            ]
        );
        $donor = new donor();
        $donor->name = $request->name;
        $donor->work = $request->work;
        $donor->period = $request->period;
        $donor->number_orphans = '0';
        $donor->start_date = $request->start_date;
        $donor->Residence_place = $request->Residence_place;
        $donor->number_phone = $request->number_phone;
        $donor->password = $request->password;

        $donor->save();
        return redirect()->route('showOrphan', 0);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function pagesearch()
    {
        return view('Enterer.disclosing_form.searchDonor');
    }
    public function search(Request $request)
    {
        $inputSearch = $request['inputSearch'];
        $donor = donor::where('name', 'like', '%' . $inputSearch . '%')->get();
        echo $donor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit($donor_id)
    {
        $donor = donor::where('id', $donor_id)->first();
        return view('Enterer.disclosing_form.edit_donor')->with('donor', $donor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'name' => 'required',
                'work' => 'required',
                'period' => 'required',
                'number_orphans' => 'required',
                'Residence_place' => 'required',
                'number_phone' => 'required',
            ]
        );
        $numberOrphans = donor::where(
            'id',
            $id
        )->get()->first();
        $numOld = $numberOrphans->number_orphans;
        $donor = donor::where(
            'id',
            $id
        )->update([
            "name" => $request->name,
            "work" => $request->work,
            "period" => $request->period,
            "number_orphans" => $request->number_orphans,
            "Residence_place" => $request->Residence_place,
            "number_phone" => $request->number_phone,
        ]);
        $numberOrphans = donor::where(
            'id',
            $id
        )->first();
        $numNew = $numberOrphans->number_orphans;
        if ($numNew < $numOld) {
            $num = $numOld - $numNew;
            for ($i = $num; $i > 0; $i--) {
                $Orphan = donor_orphan::where(
                    'donor_id',
                    $id
                )->orderBy('id', 'desc')->first();
                $Orphan->delete();
            }
        } else if ($numNew > $numOld) {
            $num = $numNew - $numOld;

            /////result of ranking algorithm
            $orphans = $this->ranking_orphan();
            for ($i = 0; $i < $num; $i++) {
                $donor_orphan = new donor_orphan();
                $donor_orphan->orphan_id = $orphans[$i];
                $donor_orphan->donor_id = $id;
                $donor_orphan->save();
                $Orphans = DB::table('orphans')->where(
                    'id',
                    $orphans[$i]
                )->update([
                    'status' => 'مكفول',

                ]);
            }
        }
        return redirect()->route('Enterer_Page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(donor $donor)
    {
    }
}
