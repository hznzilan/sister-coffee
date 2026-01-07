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
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            
            $table->string('coffee_title')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            
            $table->date('date')->nullable();
            $table->string('delivery_status')->default('processing');
            $table->string('payment_status')->default('cash on delivery');
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