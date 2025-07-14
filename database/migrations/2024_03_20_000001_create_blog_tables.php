<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Authors table
        Schema::create('blog_authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('avatar')->nullable();
            $table->text('bio');
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->timestamps();
        });

        // Categories table
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Tags table
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Posts table
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->foreignId('author_id')->constrained('blog_authors');
            $table->foreignId('category_id')->constrained('blog_categories');
            $table->string('featured_image')->nullable();
            $table->integer('read_time')->default(5);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Post-Tag relationship table
        Schema::create('blog_post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('blog_posts')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('blog_tags')->onDelete('cascade');
            $table->primary(['post_id', 'tag_id']);
        });

        // Related Posts table
        Schema::create('blog_related_posts', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('blog_posts')->onDelete('cascade');
            $table->foreignId('related_post_id')->constrained('blog_posts')->onDelete('cascade');
            $table->integer('sort_order')->default(0);
            $table->primary(['post_id', 'related_post_id']);
        });

        // Newsletter Subscribers table
        Schema::create('blog_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamp('subscribed_at');
            $table->timestamp('unsubscribed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_related_posts');
        Schema::dropIfExists('blog_post_tag');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_authors');
        Schema::dropIfExists('blog_subscribers');
    }
}; 