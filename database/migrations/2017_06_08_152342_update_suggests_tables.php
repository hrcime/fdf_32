<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSuggestsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggests', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->integer('status')->nullable()->change();
            $table->longText('content')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suggests', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->integer('status')->nullable()->change();
            $table->longText('content')->nullable()->change();
        });
    }
}
