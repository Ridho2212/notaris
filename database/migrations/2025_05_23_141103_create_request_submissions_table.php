<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('request_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->enum('request_type', ['sertifikat', 'ajb', 'waris', 'lainnya']);
            $table->date('submission_date');
            $table->enum('status', ['menunggu', 'diproses', 'selesai', 'ditolak'])->default('menunggu');
            $table->text('notes')->nullable();
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_submissions');
    }
};

