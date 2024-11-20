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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id(); // رقم الحساب
            $table->string('name'); // اسم الحساب
            $table->string('code')->unique(); // الكود (فريد)
            $table->string('type'); // نوع الحساب
            $table->unsignedBigInteger('parent_account_id')->nullable(); // الحساب الرئيسي إذا كان فرعياً
            $table->string('normal_balance'); // طبيعة الحساب
            $table->timestamps();

            // إعداد العلاقة مع الحساب الرئيسي
            $table->foreign('parent_account_id')
                  ->references('id')
                  ->on('chart_of_accounts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
