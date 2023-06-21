<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->date('entry_year');
            $table->string('type');
            $table->string('fullname');
            $table->string('gender');
            $table->date('dob');
            $table->string('birth_cert_no');
            $table->string('pos_in_family');
            $table->string('race');
            $table->string('nationality');
            $table->string('prev_kindy')->nullable()->default('None');
            $table->integer('no_years')->unsigned()->nullable();
            $table->string('religion');
            $table->longText('home_add');
            $table->string('home_lang');
            $table->string('home_tel');
            $table->string('e_contact')->nullable();
            $table->string('fam_doc')->nullable();
            $table->string('allergies')->default('None');
            $table->string('others')->nullable();
            $table->string('potential')->nullable();
            $table->foreignId('father')->references('parent_id')->on('parents')->onDelete('cascade')->onUpdate('cascade')->primary();
            $table->foreignId('mother')->references('parent_id')->on('parents')->onDelete('cascade')->onUpdate('cascade')->primary();
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
};

