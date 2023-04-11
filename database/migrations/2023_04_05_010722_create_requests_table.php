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
        Schema::create('materialrequests', function (Blueprint $table) {
            $table->id('request_id');
            $table->date('date');
            $table->string('requested_by');
            $table->string('class');
            $table->string('purpose');
            $table->string('item');
            $table->date('needed');
            $table->boolean('fulfilled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materialrequests');
    }
};
