<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->char('provinsi');
            $table->char('kabupaten');
            $table->char('kecamatan');
            $table->char('status');
            $table->char('kode_pum');
            $table->char('kelurahan');
            $table->date('tanggal');
            $table->date('tanggal_str');
            $table->char('laki_laki');
            $table->char('perempuan');
            $table->char('jumlah_penduduk');
            $table->char('jumlah_kk');
            $table->char('kepadatan');
            $table->char('deleted_at');
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
        Schema::dropIfExists('penduduk');
    }
}
