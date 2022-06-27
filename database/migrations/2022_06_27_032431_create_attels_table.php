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
        Schema::create('attels', function (Blueprint $table) {
            $table->id();//->primary();
            $table->timestamps();
            $table->string('apraksts',300);
            $table->date('datums')->format('d/m/Y');
            $table->foreignId('pasakums_id')->constrained('pasakums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attels');
    }
};
