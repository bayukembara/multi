<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id');
            $table->string('staffname', 250)->nullable();
            $table->string('department', 250)->nullable();
            $table->string('position', 100)->nullable();
            $table->bigInteger('number')->nullable();
            $table->string('currency', 100)->nullable();
            $table->string('salary', 100)->nullable();
            $table->string('resume', 250)->nullable();
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
        Schema::dropIfExists('staff');
    }
}