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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title', 100)->change();
            $table->text('description');
            $table->dropColumn('name');
            $table->renameColumn('name', 'first_name')->first()->change();
            $table->datetime('published_at');
            $table->timestamp('added_on');
            $table->boolean('is_active');
            $table->decimal('price', 8, 2);
            $table->bigInteger('views');
            $table->float('rating');
            $table->float('weight', 5, 2);
            $table->json('options');
            $table->char('code', 3);
            $table->enum('status', ['draft', 'published']);
            $table->date('birthday')->nullable();
        });
        Schema::rename('users', 'members');
        Schema::rename('members', 'users');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
