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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('invoice_number');
            $table->string('name');
            $table->string('phone');
            $table->longText('address');
            $table->integer('charge');
            $table->double('price');
            $table->string('status')->default('pending')->comment('pending, processing, confirmed, cancelled, delivered, returned');
            $table->string('consingment_id')->nullable();
            $table->string('tracking_code')->nullable();
            $table->string('courier_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
