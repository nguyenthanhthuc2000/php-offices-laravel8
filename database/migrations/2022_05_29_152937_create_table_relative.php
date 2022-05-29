<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRelative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relative', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('type_relative')->comment('1:cha,2:mẹ,3:vợ\chồng');
            $table->string('name');
            $table->string('job');
            $table->string('ethnic');
            $table->string('religion');
            $table->string('permanent_address')->comment('Địa chỉ thường trú');
            $table->string('phone');
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
        Schema::dropIfExists('table_relative');
    }
}
