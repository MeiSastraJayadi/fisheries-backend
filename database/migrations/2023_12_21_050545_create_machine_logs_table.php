<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->double('temp');
            $table->double('humid');
            $table->double('light');
            $table->double('weight');
            $table->foreign('machine_id')
                ->references('id')
                ->on('machines');
            $table->softDeletes();
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
        Schema::dropIfExists('machine_logs');
    }
}
