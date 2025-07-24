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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->enum('project_type', ['website', 'app', 'ecommerce', 'system', 'other'])->nullable();
            $table->string('budget_range')->nullable();
            $table->string('timeline')->nullable();
            $table->enum('status', ['new', 'read', 'replied', 'archived'])->default('new');
            $table->timestamp('read_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
            
            $table->index(['status', 'created_at']);
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
