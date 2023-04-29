<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CreateWarrantyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrantyrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('orphan_guardian');
            $table->text('relationship');
            $table->date('birthday');
            $table->text('certificate');
            $table->text('work');
            $table->text('death_husband_name');
            $table->date('death_husband_date');
            $table->text('death_husband_work');
            $table->integer('death_husband_salary');
            $table->text('house');
            $table->text('house_status');
            $table->text('address');
            $table->integer('phone_num');
            $table->integer('mobile_num');
            $table->text('applicant_name');
            $table->longText('comment')->nullable();

            $table->string('status')->default('none');
            $table->string('reason')->default('none');

            $table->integer('scout')->nullable();
            $table->date('Scout_Delivery_Date')->nullable();
            //////////////////////////////////////////////////
            //in case in OnHold status
            $table->integer('scout_OnHold')->nullable();
            $table->date('Scout_Delivery_Date_OnHold')->nullable();


            $table->text('final_result')->nullable();

            $table->timestamps();
        });
        $now = Carbon::now();
 

    	$orphan_guardian=array('خالد','محمد','غيث','ليلى','سامر','سلمى');
        $relationship=array('ام','ابن خال','ابن عم','جد','عم','خال');
        $birthday=array('1970-06-02 21:40:04','1940-06-02 21:40:04','1981-06-02 21:40:04','1975-06-02 21:40:04','1968-06-02 21:40:04','1969-06-02 21:40:04',);
        	$certificate=array('ثانوي','اعدادي','ابتدائي');
                	$work=array('محاسب','معلم','لا يعمل','طبيب','مهندس','عمل حر');
                    	$death_husband_name=array('خالد','محمد','غيث','فارس','سامر','جو');
                        	$death_husband_date=array('1970-06-02 21:40:04','1940-06-02 21:40:04','1981-06-02 21:40:04','1975-06-02 21:40:04','1968-06-02 21:40:04','1969-06-02 21:40:04',);
                            	$death_husband_work=array('محاسب','معلم','لا يعمل','طبيب','مهندس','عمل حر');
                                	$death_husband_salary=array('300000','80000','200000','65000','62000','120000');
                                    	$house=array('Owned','rented','guests');
                                        	$house_status=array('good','middle','bad');
                                            	$address=array('دمر','دمر البلد','مشروع دمر');
                                                	$phone_num=array('6473570');
                                                    	$mobile_num=array('0935274491');
                                                        	$applicant_name=array('محمد');
                                                            		$status=array('approved');
                                                                    	$reason=array('none');
                for($i=0;$i<200;$i++)
                {
                    DB::table('warrantyrequests')->insert(
                        array(
                            'orphan_guardian' => $orphan_guardian[rand(0,5)],
                            'relationship'=>$relationship[rand(0,5)],
                            'birthday'=>$birthday[rand(0,5)],
                            'certificate'=>$certificate[rand(0,2)],
                            'work'=>$work[rand(0,5)],
                            'death_husband_name'=>$death_husband_name[rand(0,5)],
                            'death_husband_date'=>$death_husband_date[rand(0,5)],
                            'death_husband_work'=>$death_husband_work[rand(0,5)],
                            'death_husband_salary'=>$death_husband_salary[rand(0,5)],
                            'house'=>$house[rand(0,2)],
                            'house_status'=>$house_status[rand(0,2)],
                            'address'=>$address[rand(0,2)],
                            'phone_num'=>$phone_num[0],
                            'mobile_num'=>$mobile_num[0],
                            'applicant_name'=>$applicant_name[0],
                            'status'=>$status[0],
                            'reason'=>$reason[0],


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
        Schema::dropIfExists('warrantyrequests');
    }
}
