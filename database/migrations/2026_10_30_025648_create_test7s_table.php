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
        Schema::create('test7s', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->integer('age');
            $table->decimal('price',18,2);
            $table->boolean('gender');
            $table->text('description');
            $table->string('paragraph');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('address');
            $table->string('url');
            $table->string('mac');
            $table->string('ipv4');
            $table->string('username')->nullable();
            $table->string('useragent');
            $table->string('image');
            $table->string('extension');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test7s');
    }
};
