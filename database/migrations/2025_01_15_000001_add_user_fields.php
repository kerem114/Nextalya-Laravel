<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
            $table->string('avatar')->default('avatars/default.jpg')->after('email');
            $table->text('bio')->nullable()->after('avatar');
            $table->enum('role', ['user', 'business', 'admin'])->default('user')->after('bio');
            $table->enum('gender', ['male', 'female'])->nullable()->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'avatar', 'bio', 'role', 'gender']);
        });
    }
};