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
        Schema::create('novertejums', function (Blueprint $table) {
            $table->id();//->primary();
            $table->timestamps();
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('pasakums_id')->constrained('pasakums');
            $table->integer('novertejums');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novertejums');
    }
};
