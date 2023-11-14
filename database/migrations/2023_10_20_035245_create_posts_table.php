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
        Schema::create('m_post', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('judul');
            $table->string('judul_en');
            $table->text('konten');
            $table->text('konten_en');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories'); // Adjust the 'categories' table name
            $table->string('tags')->nullable();
            $table->string('tags_en')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_post');
    }
};
