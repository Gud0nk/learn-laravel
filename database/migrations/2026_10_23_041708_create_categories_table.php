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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // поле id - первичный ключ, счетчик, беззнаковый бигинт
            $table->string('name', 128); // поле name, с типом varchar(128)
            $table->softDeletes();  // поле created_at и updated_at
            $table->timestamps();   // поле deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
