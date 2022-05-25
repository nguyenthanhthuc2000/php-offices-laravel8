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
            $table->integer('status');// 1 đang hoc, 2 đã tốt nghiệp, 3 nghĩ học, 4 bảo lưu điểm
            $table->date('birth_date')->nullable()->nullable();
            $table->integer('class_id')->nullable()->comment('Lớp hoc')->nullable();
            $table->integer('ethnic')->comment('Dân tộc')->nullable();
            $table->integer('religion')->comment('Tôn giáo')->nullable();
            $table->date('date_join_tncshcm')->comment('Ngày vào Đoàn TNCSHCM')->nullable();
            $table->date('date_join_csvn')->comment('Ngày vào Đảng CSVN')->nullable();
            $table->tinyInteger('sex')->comment('Giới tính: 1 nam, 0 nữ')->nullable();
            $table->integer('district')->comment()->nullable();
            $table->integer('province')->comment()->nullable();
            $table->integer('ward')->comment()->nullable();
            $table->integer('place_birth')->comment('Nơi sinh (Tỉnh)')->nullable();
            $table->string('identity_card_number', 40)->comment('Số chứng minh thư nhân dân')->nullable();
            $table->string('student_code', 40)->comment('Mã số SV')->nullable();
            $table->string('phone', 15)->comment('Số điện thoại liên lạc')->nullable();
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
