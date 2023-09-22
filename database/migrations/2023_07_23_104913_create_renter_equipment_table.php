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
        Schema::create('renter_equipment', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('renter_id');
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('master_equipment')->onDelete('cascade');

            $table->bigInteger('qty');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renter_equipment');
    }
};
