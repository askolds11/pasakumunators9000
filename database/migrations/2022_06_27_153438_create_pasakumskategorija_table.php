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
        Schema::create('pasakumskategorija', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pasakums_id')->constrained('pasakums');
            $table->foreignId('kategorija_id')->constrained('kategorija');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasakumskategorija');
    }
};
