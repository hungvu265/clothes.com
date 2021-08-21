<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function(Blueprint $table){
            $table->id();
            $table->integer('id_sohoadon');
            $table->integer('id_sanpham');
            $table->integer('soluong');
            $table->string('dongia');
            $table->string('tong');
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
        Schema::drop('hoadon');
    }
}
