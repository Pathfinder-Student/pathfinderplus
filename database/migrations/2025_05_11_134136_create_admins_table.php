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
        Schema::create('admins', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('fullname');
        $table->string('profile_picture')->nullable()->default('images/user-icon.png');
        $table->string('password');
        $table->string('email')->unique();
        $table->string('usertype')->default('admin');
        $table->string('role')->default('viewer');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
