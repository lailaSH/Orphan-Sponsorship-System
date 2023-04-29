<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHomeOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_ownerships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warranty_request_id')->unsigned()->unique();
            $table->string('type_ownerships');
            $table->string('home_owner')->nullable();
            $table->integer('amount_rent')->nullable();
            $table->integer('amount_pay_rent')->nullable();
            $table->text('participants_in_pay')->nullable();
            $table->text('where_from_secure_money')->nullable();
            $table->integer('number_room');
            $table->integer('number_people_in_home');
            $table->text('relative_relation');
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
            ->onDelete('cascade');
            $table->string('ownership_score');
            $table->timestamps();
        });
    
    $warranty_request_id=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,56,57,58,59,60,61,62,63,64,67,68,69,70,71,72,73,74,75,76,77,78);
    $type_ownerships=array('اجار','ملك','إعارة','استضافة');
    $home_owner=array('غيث','مالك','خالد','محمد','ليلى','موسى');
    $amount_rent=array(150000,90000);
    $amount_pay_rent=array(150000,90000);
    $participants_in_pay=array('الخال','العم','الأخ');
    $number_room=array(2,4,5,3);
    $number_people_in_home=array(2,3,4,5,6,7);
    $relative_relation=array('ام','ابن خال','ابن عم','جد','عم','خال');
    $ownership_score=array();

    for($i=0;$i<70;$i++)
                {
                    DB::table('home_ownerships')->insert(
                        array(
                            'warranty_request_id' => $warranty_request_id[$i],
                            'type_ownerships'=>$type_ownerships[rand(0,3)],
                            'home_owner'=>$home_owner[rand(0,5)],
                            'amount_rent'=>$amount_rent[rand(0,1)],
                            'amount_pay_rent'=>$amount_pay_rent[rand(0,1)],
                            'participants_in_pay'=>$participants_in_pay[rand(0,2)],
                            'number_room'=>$number_room[rand(0,3)],
                            'number_people_in_home'=>$number_people_in_home[rand(0,5)],
                            'relative_relation'=>$relative_relation[rand(0,5)],
                            'ownership_score'=>rand(1,9),

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
        Schema::dropIfExists('home_ownerships');
    }
}
