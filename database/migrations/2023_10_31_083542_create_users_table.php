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
            $table->string('title')->nullable();
            $table->integer('role')->default('0');
            $table->integer('status')->default('0')->commnet('pending: 0, enable: 1, reject: 2');
            $table->tinyinteger('user_type')->default('1')->commnet('user: 1, customer: 2');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
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
