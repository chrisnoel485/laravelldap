<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('sn');
            $table->string('description')->nullable();
            $table->integer('kategori_id');
            $table->integer('lokasi_id');
            $table->integer('merek_id');
            $table->year('tahun');
            $table->time('expired', 0);
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
        Schema::dropIfExists('produks');
    }
}
