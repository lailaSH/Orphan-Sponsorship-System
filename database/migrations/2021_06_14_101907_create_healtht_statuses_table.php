<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateHealthtStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healtht_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('statue');
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->string('adding_date');
            $table->timestamps();
        });
        DB::table('healtht_statuses')->insert(
            array(
                'statue' => 'مرض مزمن',
                'adding_date'=>'1970-06-02 21:40:04',
                )
        ); DB::table('healtht_statuses')->insert(
            array(
                'statue' => 'مرض غير مزمن',
                'adding_date'=>'1970-06-02 21:40:04',
                )
        );
        DB::table('healtht_statuses')->insert(
            array(
                'statue' => 'اعاقة',
                'adding_date'=>'1970-06-02 21:40:04',
                )
        );
        DB::table('healtht_statuses')->insert(
            array(
                'statue' => 'جيد',
                'adding_date'=>'1970-06-02 21:40:04',
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healtht_statuses');
    }
}
