<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tinhtrang_id')->constrained('tinhtrang');
            $table->foreignId('user_id')->constrained('users');
            $table->string('dienthoaigiaohang', 20);
            $table->string('diachigiaohang');
            $table->string('chitietgiaohang')->nullable();
            $table->integer('khuyenmai')->nullable();
            $table->unsignedTinyInteger('xoa')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
