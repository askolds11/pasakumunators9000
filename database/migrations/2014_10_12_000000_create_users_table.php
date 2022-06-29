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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('banned_status')->default(0);
            $table->rememberToken();
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
        if(Schema::hasTable('lietotajsloma'))
        {
        Schema::table('lietotajsloma', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
        }

        if(Schema::hasTable('komentars'))
        {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
        }

        if(Schema::hasTable('lietotajspasakums'))
        {
        Schema::table('lietotajspasakums', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
        }

        if(Schema::hasTable('novertejums'))
        {
        Schema::table('novertejums', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropColumn('users_id');
        });
        }

        if(Schema::hasTable('pasakums'))
        {
        Schema::table('pasakums', function (Blueprint $table) {
            $table->dropForeign(['veidotajs_id']);
            $table->dropColumn('veidotajs_id');
        });
        }

        Schema::dropIfExists('users');
    }
};
