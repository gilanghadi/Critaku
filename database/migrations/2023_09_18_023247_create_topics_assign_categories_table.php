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
        Schema::create('topics_assign_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->nullable()->constrained(table: 'blogs', indexName: 'topics_assign_categories_blog_id');
            $table->foreignId('category_id')->nullable()->constrained(table: 'categories', indexName: 'topics_assign_categories_category_id');
            $table->foreignId('topic_id')->nullable()->constrained(table: 'topics', indexName: 'topics_assign_categories_topic_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics_assign_categories');
    }
};
