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

            $table->unsignedBigInteger('renter_id');
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->json('equipment')->nullable();
            $table->string('date')->nullable();
            $table->float('total')->nullable();
            $table->string('status')->default('pending')->nullable();
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
