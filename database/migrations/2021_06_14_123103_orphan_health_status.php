<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class OrphanHealthStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphan_health_status', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('healtht_status_id')->unsigned();
            $table->integer('orphan_id')->unsigned();

            $table->timestamps();
        });    
        $healtht_status_id=array(1,2,3,4);

                for($i=0;$i<2000;$i++)
                {
                    DB::table('orphan_health_status')->insert(
                        array(
                            'healtht_status_id' => $healtht_status_id[rand(0,3)],
                            'orphan_id'=>$i,
                            )
                    );
                } 

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orphan_health_status');
//
    }
}
