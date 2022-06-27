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
        Schema::create('lietotajsloma', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->foreignId('lietotajs_id')->constrained('lietotajs');
            $table->foreignId('loma_nosaukums')->constrained('loma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lietotajsloma');
    }
};
