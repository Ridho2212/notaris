<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ppat_services', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->enum('service_type', ['jual_beli', 'hibah', 'tukar_menukar', 'dll']);
            $table->string('document_number');
            $table->date('service_date');
            $table->text('object_address');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppat_services');
    }
};
