<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string("program_id")->nullable();
            $table->string("judges_id")->nullable();
            $table->string("s_id")->nullable();
            $table->string("marks")->nullable();
            $table->string("h_marks")->nullable();
            $table->string("c_name")->nullable();
            $table->string("priority")->nullable();
            $table->string("insertedBy")->nullable();
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
        Schema::dropIfExists('results');
    }
}
