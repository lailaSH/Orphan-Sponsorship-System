<?php

namespace App\Http\Controllers;

use App\Models\donor;
use App\Models\donor_orphan;
use App\Models\Orphan;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;



class DonorCon extends Controller
{
    public function Donorlogin()
    {
        return view('Donor.DonorLogin');
    }

    public function MainPage(Request $request)
    {
        $password= Hash::make($request->password);
        $Donor = DB::table('donors')->where('name',$request->name)->first();
        return view('Donor.MainPage')->with('Donor', $Donor);
    }
    public function Page($id)
    {        $Donor = DB::table('donors')->where('id',$id)->first();
        return view('Donor.MainPage')->with('Donor', $Donor);
    }
    public function Donor_logout()
    {
        return view('Donor.DonorLogin');
    }
    public function edit($donor_id)
    {
        $donor = donor::where('id', $donor_id)->first();
        return view('Donor.edit_donor')->with('Donor', $donor);
    }

    public function info($donor_id)
    {
        $donor = donor::where('id', $donor_id)->first();
        $number_orphans=donor_orphan::where('donor_id',$donor_id)->count();
        $now=Carbon::now();
        $monthnow=$now->format('M');
        $Yearnow=$now->format('Y');
        $count=0;
        $total=0;


        $number_payments=payment::where('id_donor',$donor_id)->count();
        $payments=payment::where('id_donor',$donor_id)->get();
        foreach($payments as $payment)
        {
            $date=strtotime($payment->date_payment);
            $year= date('Y',$date);
            $month= date('M',$date);

            if( $year==$Yearnow && $month==$monthnow ) 
            {
                $count++;
                $total+=($payment->amount)*$count;
            }
        }
        $countNoPayment=$number_orphans-$count;

        return view('Donor.info')->with(['Donor'=> $donor,'countPayment'=>$count,'count'=>$countNoPayment,'total'=>$total]);
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
return redirect()->back();
    }

}