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
        Schema::create('maintainence', function (Blueprint $table) {
            $table->id('issueNo');
            $table->string('issue');
            $table->string('reported_by');
            $table->string('location');
            $table->date('reported_at');
            $table->boolean('fixed')->default(false);
            $table->string('remarks')->nullable();
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintainence');
    }
};
