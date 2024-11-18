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
        Schema::create('credit_notifications', function (Blueprint $table) {
            $table->id(); // معرّف فريد لكل إشعار
            $table->string('client_name'); // اسم العميل
            $table->string('city')->nullable(); // المدينة (يمكن أن يكون فارغًا)
            $table->string('tax_number')->nullable(); // الرقم الضريبي (يمكن أن يكون فارغًا)
            $table->decimal('amount', 10, 2); // المبلغ (رقم عشري)
            $table->string('notification_number')->nullable(); // رقم الإشعار (يمكن أن يكون فارغًا)
            $table->string('created_by'); // اسم المستخدم الذي أنشأ الإشعار
            $table->timestamps(); // حقول created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_notifications');
    }
};
