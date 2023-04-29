<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_evaluation');
            $table->string('poor_degree');
            $table->string('notes')->nullable();
            $table->integer('warranty_request_id')->unsigned()->unique();
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
                ->onDelete('cascade');
            $table->integer('evaluations_score');
            $table->timestamps();
        });
        $warranty_request_id=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,56,57,58,59,60,61,62,63,64,67,68,69,70,71,72,73,74,75,76,77,78);
        $house_evaluation=array('وسط','جيد','رديئة');
        $poor_degree=array('وسط','جيد','شديد');
        $evaluations_score=array(8,6,4,2,0);
        	    for($i=0;$i<70;$i++)
                {
                    DB::table('evaluations')->insert(
                        array(
                            'warranty_request_id' => $warranty_request_id[$i],
                            'house_evaluation'=>$house_evaluation[rand(0,2)],
                            'poor_degree'=>$poor_degree[rand(0,2)],
                            'evaluations_score'=>$evaluations_score[rand(0,4)],
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
        Schema::dropIfExists('evaluations');
    }
}
