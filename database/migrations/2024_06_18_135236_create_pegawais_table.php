<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid("id_pegawai")->primary();
            $table->string("nama_pegawai");
            $table->string("alamat");
            $table->date("tanggal_lahir");
            $table->string("telepon");
            $table->string("email");
            $table->string("foto");
            $table->enum("jenis_kelamin",["laki-laki","perempuan"]);
            $table->enum("posisi",["manager","koki","pelayan","kasir","cleaning service"]);
            $table->enum("status",["tetap","kontrak","magang"]);
            $table->date("tanggal_bergabung");
            $table->decimal("gaji",10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
