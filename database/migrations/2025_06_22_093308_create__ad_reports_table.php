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
        Schema::create('_ad_reports', function (Blueprint $table) {
            $table->id();
            Schema::create('ad_reports', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');      // مين بلغ
                $table->unsignedBigInteger('ad_id');        // الإعلان المبلغ عنه
                $table->text('reason')->nullable();         // سبب الإبلاغ (اختياري)
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            });
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_ad_reports');
    }
};
