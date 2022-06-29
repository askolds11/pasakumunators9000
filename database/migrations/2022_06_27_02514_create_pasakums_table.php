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
        Schema::create('pasakums', function (Blueprint $table) {
            $table->id();//->primary();
            $table->timestamps();
            $table->string('nosaukums',50);
            $table->string('apraksts',500);
            //$table->date('datums')->format('d/m/Y');
            $table->dateTime('datums', $precision = 0);
            $table->integer('norises_ilgums');
            $table->string('norises_vieta',100);
            $table->decimal('cena',5,2);
            $table->foreignId('veidotajs_id')->constrained('users');
            $table->foreignId('attels_id')->constrained('attels');
            $table->boolean('approved_status')->default(0);
            //$table->foreignId('kategorija_id')->constrained('kategorija');
        });

        Schema::table('attels', function (Blueprint $table) {
            $table->foreign('pasakums_id')->references('id')->on('pasakums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('attels'))
        {
        Schema::table('attels', function (Blueprint $table) {
            $table->dropForeign(['pasakums_id']);
            $table->dropColumn('pasakums_id');
        });
        }

        Schema::dropIfExists('pasakums');
    }
};
