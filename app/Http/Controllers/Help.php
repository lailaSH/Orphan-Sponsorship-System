<?php

namespace App\Http\Controllers;

use App\Models\Health_Help;
use App\Models\Orphan;
use App\Models\WarrantyRequest;
use Illuminate\Http\Request;

class Help extends Controller
{
    public function flag1()
    {

        return redirect()->route('health_help', ['flag' => 1]);
    }

    public function confirm(Request $request)
    {

        $requestt = WarrantyRequest::find($request->number);
        if ($requestt == null) {
            return redirect()->back()->withErrors("رقم غير صحيح");
        }
        if ($requestt->status == 'approved') {
            return view('Enterer.Help.Health.add_new_statu', ['flag' => 2, 'orphans' => $requestt->orphans]);
        } else
            return redirect()->back()->withErrors("رقم غير صحيح");
    }

    public function display_health_form($id)
    {
        return view('Enterer.Help.Health.add_new_statu', ['flag' => 3, 'id' => $id]);
    }


    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'cost' => 'required',
                'date' => 'required',
                'type' => 'required',
            ],

        );
        $help = new Health_Help();
        $help->cost = $request->cost;
        $help->date = $request->date;
        $help->type = $request->type;
        $help->note = $request->note;
        $help->orphan_id = $id;
        $help->save();
        return redirect()->route('health_help', ['flag' => 0]);
    }
}
