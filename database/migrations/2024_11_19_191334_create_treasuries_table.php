<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id(); // رقم الخزينة
            $table->string('name'); // اسم الخزينة
            $table->string('location')->nullable(); // الموقع
            $table->enum('treasury_status', ['active', 'inactive'])->default('active'); // الحالة
            $table->text('description')->nullable(); // وصف الخزينة
            $table->enum('permissions', ['withdraw', 'deposit', 'both'])->default('both'); // الصلاحيات
            $table->decimal('balance', 15, 2)->default(0); // الرصيد الحالي
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasuries');
    }
};
