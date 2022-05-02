<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModifyToInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info', function (Blueprint $table) {
            $table->integer('type_education')->comment('Bậc đào tạo: 1. Chính quy, 2.Chất lượng cao');
            $table->integer('branch')->comment('Ngành học');
            $table->integer('education_level')->comment('Bậc đào tạo: 1 đại học, 2 cao đẳng');
            $table->integer('school_year', )->comment('Niên khóa vd: 2018-2022');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info', function (Blueprint $table) {
            //
        });
    }
}
