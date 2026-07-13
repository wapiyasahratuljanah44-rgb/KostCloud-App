<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kost');
            $table->text('alamat');
            $table->decimal('harga', 12, 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kosts');
    }
};