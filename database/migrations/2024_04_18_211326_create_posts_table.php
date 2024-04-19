<?php

use App\Enums\PostType;
use App\Enums\Status;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            // $table->string('slug')->unique();
            $table->longText('content');
            $table->bigInteger('user_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('sub_category_id')->nullable();
            $table->unsignedTinyInteger('post_type')->default(PostType::ARTICLE);
            $table->bigInteger('image_id')->nullable();
            $table->text('video_url')->nullable();

            //visibility

            // $table->unsignedTinyInteger('slider')->default(0);
            // $table->integer('slider_order')->default(0);
            $table->unsignedTinyInteger('treding_topic')->default(0);
            // $table->integer('treding_topic_order')->default(0);
            $table->unsignedTinyInteger('stories')->default(0);
            // $table->integer('stories_order')->default(0);
            // $table->unsignedTinyInteger('featured')->default(0);
            // $table->integer('featured_order')->default(0);
            $table->unsignedTinyInteger('breaking')->default(0);
            // $table->integer('breaking_order')->default(0);
            $table->unsignedTinyInteger('recommended')->default(0);
            // $table->integer('recommended_order')->default(0);

            $table->text('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('tags')->nullable();

            $table->unsignedBigInteger('status')->default(Status::PUBLISH);
            $table->bigInteger('total_views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
