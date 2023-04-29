<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateScoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('phone_number');
            $table->date('assign_date');
            $table->string('current_address');
            $table->timestamps();
        });
    	$full_name=array('خالد','محمد','غيث','ليلى','سامر','سلمى');
        $phone_number=array('0935274491');
        $assign_date=array('1970-06-02 21:40:04','1940-06-02 21:40:04','1981-06-02 21:40:04','1975-06-02 21:40:04','1968-06-02 21:40:04','1969-06-02 21:40:04',);
        $current_address=array('دمر','دمر البلد','مشروع دمر');

        for($i=0;$i<10;$i++)
        {
            DB::table('scouts')->insert(
                array(
                    'full_name' => $full_name[rand(0,5)],
                    'phone_number' => $phone_number[0],
                    'assign_date' => $assign_date[rand(0,5)],
                    'current_address' => $current_address[rand(0,2)],

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
        Schema::dropIfExists('scouts');
    }
}
