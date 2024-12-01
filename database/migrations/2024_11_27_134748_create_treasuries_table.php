<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreasuriesTable extends Migration
{
    public function up()
    {
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id(); // مفتاح أساسي
            $table->string('name'); // اسم الخزينة
            $table->string('location')->nullable(); // الموقع
            $table->enum('treasury_status', ['active', 'inactive'])->default('active'); // الحالة
            $table->text('description')->nullable(); // وصف
            $table->decimal('balance', 15, 2)->default(0); // الرصيد
            $table->timestamps(); // تاريخ الإنشاء والتحديث
        });
    }

    public function down()
    {
        Schema::dropIfExists('treasuries');
    }
}
