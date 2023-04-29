<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_request_id')->unsigned()->unique();
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
                ->onDelete('cascade');
            $table->string('family_type');      /*added */
            $table->string('family_name');
            $table->string('mother_name');
            $table->string('mother_job')->nullable();
            $table->string('mother_salary')->nullable();
            $table->string('social_stuation');
            $table->string('father_name');
            $table->string('death_reason');
            $table->date('death_date');
            $table->string('guardian_name')->nullable();
            $table->string('guardian_job')->nullable();
            $table->string('guardian_salary')->nullable();
            $table->string('guardian_type');        /* added */
            $table->string('guardian_relative_relation');
            $table->string('telephone_fix')->nullable();
            $table->string('mobile')->nullable();
            $table->string('original_address');
            $table->string('current_address');
            $table->integer('full_children_number');
            $table->integer('number_of_children_residing_with_the_mother')->nullable();
            $table->integer('married_children_number')->nullable();
            $table->integer('married_sons_number_resident')->nullable();
            $table->integer('married_sons_number_separated')->nullable();
            $table->integer('basic_score');     /*added */
            //////////////////////////////////////////////

            $table->timestamps();
        });
        
        $warranty_request_id=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,56,57,58,59,60,61,62,63,64,67,68,69,70,71,72,73,74,75,76,77,78);
        $family_type=array('مقيم','مهجر');
        $family_name=array('خالد','محمد','غيث','فارس','سامر','جو');
        	$mother_name=array('سيرينا','ديانا','راما','لما','حلا','ليلى');
                	$mother_job=array('محاسب','معلم','لا يعمل','طبيب','مهندس','عمل حر');
                    	$social_stuation=array('ارملة','متزوجة','مطلقة');
                        	$father_name=array('خالد','محمد','غيث','فارس','سامر','جو');
                            $death_reason=array('مرض مزمن','جلطة','طبيعية','حادثة');
                                	$mother_salary=array('300000','80000','200000','65000','62000','120000');
                                    $death_date=array('1970-06-02 21:40:04','1940-06-02 21:40:04','1981-06-02 21:40:04','1975-06-02 21:40:04','1968-06-02 21:40:04','1969-06-02 21:40:04',);
                                    $guardian_type=array('الام ',' وصي الشرعي');
                                    $guardian_relative_relation=array('ام','ابن خال','ابن عم','جد','عم','خال');
                                    $original_address=array('دمر','دمر البلد','مشروع دمر');
                                    $current_address=array('دمر','دمر البلد','مشروع دمر');
                                    $full_children_number=array(1,2,3,4,5,6,7);
                                $basic_score=array(4,5,6,7,8,9,10,11);
                for($i=0;$i<70;$i++)
                {
                    DB::table('basic_infos')->insert(
                        array(
                            'warranty_request_id' => $warranty_request_id[$i],
                            'family_type'=>$family_type[rand(0,1)],
                            'family_name'=>$family_name[rand(0,5)],
                            'mother_name'=>$mother_name[rand(0,5)],
                            'mother_job'=>$mother_job[rand(0,5)],
                            'social_stuation'=>$social_stuation[rand(0,2)],
                            'father_name'=>$father_name[rand(0,5)],
                            'death_reason'=>$death_reason[rand(0,3)],
                            'mother_salary'=>$mother_salary[rand(0,5)],
                            'death_date'=>$death_date[rand(0,5)],
                            'guardian_type'=>$guardian_type[rand(0,1)],
                            'guardian_relative_relation'=>$guardian_relative_relation[rand(0,5)],
                            'original_address'=>$original_address[rand(0,2)],
                            'current_address'=>$current_address[rand(0,2)],
                            'full_children_number'=>$full_children_number[rand(0,6)],
                            'basic_score'=>$basic_score[rand(0,7)],
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
        Schema::dropIfExists('basic_infos');
    }
}
