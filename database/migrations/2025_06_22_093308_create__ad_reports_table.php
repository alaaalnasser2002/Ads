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
            Schema::create('ad_reports', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');     // مين بلغ
                $table->foreignId('ad_id')->constrained()->onDelete('cascade');        // الإعلان المبلغ عنه
                $table->text('reason')->nullable();         // سبب الإبلاغ (اختياري)
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
