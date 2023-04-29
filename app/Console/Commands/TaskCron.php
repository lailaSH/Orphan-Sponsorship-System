<?php

namespace App\Console\Commands;

use App\Models\Orphan;
use App\Models\OrphanMore18;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TaskCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update orphan age every birth_date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //update orphan's age in his birth_day

        $all = Orphan::all();
        $now = Carbon::now();

        foreach ($all as $it) {
            $d1 = new DateTime($it->birth_date);
            $d2 = new DateTime($now);

            $interval = $d1->diff($d2);
            $diffInMonths  = $interval->m;
            $diffInDays = $interval->d;
            if ($diffInMonths == 0 && $diffInDays == 0) {
                $it->age = $it->age + 1;
                $it->save();
            }
        }


        // $orphans = DB::update('update orphans set age = age+1');



        ///////////////////////////////////////////////////////
        //check the orphans with age more than 18 and but them in "orphanmore18" table

        $all_orphans = Orphan::all()->where('age', 18);

        foreach ($all_orphans as $item) {

            $orphan = new OrphanMore18();

            $orphan->name = $item->name;
            $orphan->age = 18;
            $orphan->certificate = "un_defined";
            $orphan->desire_to_work = "un_defined";
            $orphan->warranty_request_id = $item->warranty_request_id;
            $orphan->save();

            $item->delete();
        }
    }
}
