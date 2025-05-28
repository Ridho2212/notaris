<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('service_fees', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('service_type');
            $table->text('cost_details');
            $table->decimal('total_amount', 15, 2);
            $table->enum('payment_status', ['belum_bayar', 'lunas'])->default('belum_bayar');
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_fees');
    }
};
    