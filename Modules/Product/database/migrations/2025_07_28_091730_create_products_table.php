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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('topcat_id')->nullable()->constrained('topcats')->onDelete('cascade');
            $table->foreignId('subcat_id')->nullable()->constrained('subcats')->onDelete('cascade');
            $table->foreignId('lowcat_id')->nullable()->constrained('lowcats')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')>nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('platform')->nullable();
            $table->string('url')->nullable();
            $table->string('base_token', 32)->unique();
            $table->enum('visibility', ['friends','everyone','just_me']);
            $table->enum('type', ['product','post','poll','discussion']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
