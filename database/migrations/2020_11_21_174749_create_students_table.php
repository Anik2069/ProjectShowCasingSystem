<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("s_id")->nullable();
            $table->string("phone")->nullable();
            $table->string("institution")->nullable();
            $table->string("department")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->string("program_id")->nullable();
            $table->string("user_no_fk")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('students');
    }
}
