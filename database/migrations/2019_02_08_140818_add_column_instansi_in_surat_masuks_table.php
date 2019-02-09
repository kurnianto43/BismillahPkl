<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInstansiInSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            $table->integer('instansi_id')->unsigned()->after('nomor_surat');

            $table->foreign('instansi_id')->references('id')->on('instansis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            //
        });
    }
}
