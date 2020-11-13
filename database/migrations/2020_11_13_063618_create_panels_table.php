<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panels', function (Blueprint $table) {
            $table->id();
            $table->string("org_name")->nullable();
            $table->string("purpose")->nullable();
            $table->string("poster")->nullable();
            $table->string("sub_program")->nullable();
            $table->string("participant")->nullable();
            $table->string("noofsupervisor")->nullable();
            $table->string("judges")->nullable();
            $table->string("subadmin")->nullable();
            $table->string("p_status")->nullable();
            $table->string("p_method")->nullable();
            $table->string("txid")->nullable();
            $table->string("status")->nullable();
            $table->string("insertBy")->nullable();
            $table->string("assign_subadmin")->nullable();
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
        Schema::dropIfExists('panels');
    }
}
