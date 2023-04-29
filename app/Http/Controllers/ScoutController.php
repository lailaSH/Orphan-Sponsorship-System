<?php

namespace App\Http\Controllers;

use App\Models\Scout;
use App\Models\WarrantyRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('enterer');
    }

    public function show($wr_id)
    {
        $scouts = Scout::all();

        return view('Enterer.scouts_list', ['wr_id' => $wr_id, 'scouts' => $scouts]);
    }
    public function add($wr_id, $s_id)
    {
        $now = Carbon::now();
        $request = WarrantyRequest::find($wr_id);
        if ($request->status == 'none') {
            $request->scout = $s_id;
            $request->Scout_Delivery_Date = $now;
            $request->status = 'waiting to be revealed';
            $request->save();
            return redirect()->route('warranty_requests_display');
        }
        if ($request->status == 'OnHold') {
            $request->scout_OnHold = $s_id;
            $request->Scout_Delivery_Date_OnHold = $now;
            $request->status = 'waiting_for_correcting';
            $request->save();
            return redirect()->back();
        }
    }





    public function scouts_requests($s_id,$wr_id)
    {

        $requests = DB::table('warrantyrequests')->where('scout', $s_id)->where('status', 'waiting to be revealed')->get();
        return view('Enterer.scouts_info', ['requests' => $requests, 'id' => $s_id,'wr_id'=>$wr_id]);
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Scout $scout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scout  $scout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scout $scout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scout  $scout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scout $scout)
    {
        //
    }
}
