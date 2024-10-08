<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDryHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dry_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->double('assign_weight');
            $table->boolean('finish');
            $table->foreign('machine_id')
                ->references('id')
                ->on('machines');
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
        Schema::dropIfExists('dry_histories');
    }
}
