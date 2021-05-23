<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReportVerifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('reportable_id')->unsigned();
            $table->string('reportable_type');
            $table->date('date');

            $table->foreign('county_id')->references('id')->on('counties');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('report_verifications');
    }
}
