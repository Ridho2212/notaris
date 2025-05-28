<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notary_services', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->enum('document_type', ['pendirian_pt', 'perubahan_ad', 'kuasa', 'dll']);
            $table->date('processing_date');
            $table->string('document_number');
            $table->string('draft_path')->nullable(); // Upload Draft Akta
            $table->text('notes')->nullable();        // Catatan Tambahan
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('notary_services');
    }
};
