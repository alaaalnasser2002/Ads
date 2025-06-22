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
        Schema::create('satistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->integer('views')->default(0);
            $table->integer('clicks')->default(0);
            $table->decimal('earnings', 10, 2)->default(0);
            $table->float('conversion_rate')->default(0);
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satistics');
    }
};
