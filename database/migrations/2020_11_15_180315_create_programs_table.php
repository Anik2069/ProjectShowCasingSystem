<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string("program_name");
            $table->text("purpose")->nullable();
            $table->string("program_date");
            $table->string("lastDateOfRegistration");
            $table->string("no_of_student");
            $table->string("no_of_judges");
            $table->string("p_method")->nullable();
            $table->string("txid")->nullable();
            $table->string("insertedBy");
            $table->string("status")->nullable();
            $table->string("panel_info")->nullable();
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
        Schema::dropIfExists('programs');
    }
}
