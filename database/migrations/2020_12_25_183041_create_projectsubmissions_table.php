<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectsubmissions', function (Blueprint $table) {
            $table->id();
            $table->string("program")->nullable();
            $table->string("name")->nullable();
            $table->string("marks")->nullable();
            $table->string("prority")->nullable();
            $table->string("inserted_by")->nullable();
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
        Schema::dropIfExists('projectsubmissions');
    }
}
