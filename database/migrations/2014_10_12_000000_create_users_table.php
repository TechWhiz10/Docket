<?php

use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email')->unique();
            $table->string('password', 255)->nullable()->default(Hash::make('12345678'));
            $table->string('avatar', 255)->nullable()->default('default.png');
            $table->string('phone', 255)->nullable();
            $table->string('customer_logo', 255)->nullable();
            $table->string('customer_name', 255)->nullable();
            $table->string('site_name', 255)->nullable();
            $table->string('account_manager', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->integer('role')->default('0');
            $table->integer('stage')->default('0');
            $table->integer('status')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
