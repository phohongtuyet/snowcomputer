<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hangsanxuat_id')->constrained('hangsanxuat');
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('noisanxuat_id')->constrained('noisanxuat');
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->integer('soluong');
            $table->double('dongia');
            $table->text('motasanpham')->nullable();
            $table->unsignedTinyInteger('hienthi')->default(1);
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
        Schema::dropIfExists('sanpham');
    }
}
