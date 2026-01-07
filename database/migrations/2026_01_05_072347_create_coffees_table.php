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
        Schema::create('coffees', function (Blueprint $table) {
        $table->id();
        $table->string('name');           // Coffee Name
        $table->longText('detail');     // Coffee Details
        $table->string('category');       // Coffee Series, etc.
        $table->decimal('price', 8, 2);   // Price (e.g., 8.50)
        $table->string('image')->nullable(); // Image file name
        $table->timestamps();             // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffees');
    }
};
