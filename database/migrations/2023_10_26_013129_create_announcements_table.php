<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->nullable();
            $table->string('slug_en', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('thumbnail_meta', 255)->nullable();
            $table->string('thumbnail_meta_en', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->longText('content')->nullable();
            $table->longText('content_en')->nullable();
            $table->json('attachment')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
};
