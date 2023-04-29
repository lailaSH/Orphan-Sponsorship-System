<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorOrphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_orphans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orphan_id')->unsigned()->unique();
            $table->integer('donor_id')->unsigned();
            $table->foreign('orphan_id')->references('id')->on('orphans')
            ->onDelete('cascade');
            $table->foreign('donor_id')->references('id')->on('donors')
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
        Schema::dropIfExists('donor_orphans');
    }
}
