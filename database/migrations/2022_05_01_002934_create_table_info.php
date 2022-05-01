<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('birth_date');
            $table->integer('ethnic')->comment('Dân tộc');
            $table->integer('religion')->comment('Tôn giáo');
            $table->date('date_join_tncshcm')->comment('Ngày vào Đoàn TNCSHCM')->nullable();
            $table->date('date_join_csvn')->comment('Ngày vào Đảng CSVN')->nullable();
            $table->tinyInteger('sex')->comment('Giới tính: 1 nam, 0 nữ');
            $table->integer('district')->comment();
            $table->integer('province')->comment();
            $table->integer('ward')->comment();
            $table->integer('place_birth')->comment('Nơi sinh (Tỉnh)');
            $table->string('identity_card_number', 40)->comment('Số chứng minh thư nhân dân');
            $table->string('student_code', 40)->comment('Mã số SV');
            $table->string('phone', 15)->comment('Số điện thoại liên lạc');
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
        Schema::dropIfExists('info');
    }
}
