<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('sn')->unique();
            $table->string('deskripsi')->nullable();
            $table->integer('kategori_id')->unsigned();;
            $table->integer('lokasi_id')->unsigned();;
            $table->integer('merek_id')->unsigned();;
            $table->date('tahun');
            $table->date('expired');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onDelete('cascade');
            $table->foreign('lokasi_id')->references('id')->on('lokasis')
                ->onDelete('cascade');
                $table->foreign('merek_id')->references('id')->on('mereks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
