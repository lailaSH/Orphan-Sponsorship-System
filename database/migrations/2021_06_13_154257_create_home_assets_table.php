<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('element');
            $table->string('availablility');
            $table->string('amount')->nullable();
            $table->string('status');
            $table->string('source');
            $table->string('notes')->nullable();
            $table->integer('warranty_request_id')->unsigned();
            $table->foreign('warranty_request_id')->references('id')->on('warrantyrequests')
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
        Schema::dropIfExists('home_assets');
    }
}
