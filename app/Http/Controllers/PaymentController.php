<?php

namespace App\Http\Controllers;

use App\Models\donor;
use App\Models\donor_orphan;
use App\Models\payment;
use App\Models\url;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PaymentController extends Controller
{
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
    public function payment()
    {
     return view('Enterer.Payment.Payment');
    }
    public function create($id)
    {
        $number_orphans=donor_orphan::where('donor_id',$id)->count();
        $donor_id=$id;
        if (url()->previous() != url()->current()) {
            $url = url::where(
                'id',
                1
            )->update([
                "path" => url()->previous(),
            ]);
        }
        return view('Enterer.Payment.AddPayments')->with(['number_orphans'=>$number_orphans,'id'=>$donor_id]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$donor_id)
    {
        $now = Carbon::now();
        $orphans=array();
        $donor_orphan= donor_orphan::where(
            'donor_id',
            $donor_id
        )->get();
    foreach($donor_orphan as $orphan)
    {
    $orphans[]=$orphan->orphan_id;
    }
        for($i=0;$i<$request->number_orphans;$i++)
        {
        $orphans[]=
        $payment=new payment();
        $payment->id_donor=$donor_id;
        $payment->id_orphan=$orphans[$i];
        $payment->date_payment=$now;
        $payment->save();
        }
        $url = url::all()->first();
        $path = $url->path;
        return redirect()->to($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}
