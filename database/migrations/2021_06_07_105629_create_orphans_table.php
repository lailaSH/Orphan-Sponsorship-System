<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('class')->nullable();
            $table->string('school')->nullable();
            $table->date('birth_date');
            $table->integer('age');
            $table->string('gender');
            $table->string('status')->default('not_guaranteed');
            $table->integer('warranty_request_id')->unsigned();
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
                ->onDelete('cascade');
            $table->integer('health_score');
            $table->timestamps();
        });


        $name=array('خالد','محمد','غيث','ليلى','سامر','سلمى');
        	$class=array('ثانوي','اعدادي','ابتدائي');
                	$school=array('المغتربين ولكن','كمال الحجار','نور الفجر','الاندلس','السعادة','الفجر');
                        	$birth_date=array('1970-06-02 21:40:04','1940-06-02 21:40:04','1981-06-02 21:40:04','1975-06-02 21:40:04','1968-06-02 21:40:04','1969-06-02 21:40:04',);
                            	$age=array('15','1','4','7','9','8');
                                $gender=array('male','female');
                                	$status=array('not_guaranteed');
                                        	$warranty_request_id=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,56,57,58,59,60,61,62,63,64,67,68,69,70,71,72,73,74,75,76,77,78);
$health_score=array(0,7,2,5);
                for($i=0;$i<2000;$i++)
                {
                    DB::table('orphans')->insert(
                        array(
                            'name' => $name[rand(0,5)],
                            'class'=>$class[rand(0,2)],
                            'school'=>$school[rand(0,5)],
                            'birth_date'=>$birth_date[rand(0,5)],
                            'age'=>$age[rand(0,5)],
                            'gender'=>$gender[rand(0,1)],
                            'status'=>$status[0],
                            'warranty_request_id'=>$warranty_request_id[rand(0,70)],
                            'health_score'=>$health_score[rand(0,3)],
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
        Schema::dropIfExists('orphans');
    }
}
