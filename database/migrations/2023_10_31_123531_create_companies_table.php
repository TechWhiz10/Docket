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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name', 255);
            $table->foreignId('owner_id')->nullable();
            $table->integer('default_location_id');
            $table->string('primary_contact_id')->nullable();
            $table->foreignId('stage_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->string('nickname')->nullable();
            $table->bigInteger('billing_contact_id')->nullable();
            $table->integer('parent_company_id')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
