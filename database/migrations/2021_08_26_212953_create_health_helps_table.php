<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_helps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->date('date');
            $table->integer('cost');
            $table->string('note')->nullable();
            $table->integer('orphan_id')->unsigned();
            $table->foreign('orphan_id')->references('id')->on('orphans')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_helps');
    }
}
