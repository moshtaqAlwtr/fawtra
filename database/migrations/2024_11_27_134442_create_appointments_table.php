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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable(); // العميل
            $table->date('appointment_date'); // التاريخ
            $table->time('time'); // الوقت
            $table->string('duration')->nullable(); // المدة
            $table->string('actions')->nullable(); // الإجراءات
            $table->text('notes')->nullable(); // الملاحظات
            $table->boolean('share_with_client')->default(false); // مشاركة مع العميل
            $table->boolean('recurring')->default(false); // مكرر
            $table->boolean('assign_to_employees')->default(false); // تعيين إلى موظفين
            $table->timestamps(); // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
