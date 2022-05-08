<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSignFacultyToClassList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_list', function (Blueprint $table) {
            $table->string('sign')->after('name');
            $table->string('faculty_id')->after('sign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_list', function (Blueprint $table) {
            //
        });
    }
}
