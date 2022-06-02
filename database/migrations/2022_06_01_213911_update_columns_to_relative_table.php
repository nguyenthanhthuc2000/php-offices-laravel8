<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToRelativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relative', function (Blueprint $table) {
            $table->string('job')->nullable()->change();
            $table->string('ethnic', 15)->nullable()->change();
            $table->string('permanent_address')->nullable()->change();
            $table->string('phone', 13)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relative', function (Blueprint $table) {
            //
        });
    }
}
