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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable();
            $table->enum('status', ["pending", "sent", "read", "error", "unread", "process"])->default("pending");
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('room_id')->nullable()->references('id')->on('chat_rooms');
            $table->foreignId('parent_id')->nullable()->references('id')->on('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
