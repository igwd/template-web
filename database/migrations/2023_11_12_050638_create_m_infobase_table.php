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
        Schema::create('m_infobase', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id');
            $table->foreign('site_id')->references('id')->on('m_site'); // Define foreign key relationship
            $table->string('heading_1', 100)->nullable();
            $table->string('heading_1_en', 100)->nullable();
            $table->string('heading_2', 100)->nullable();
            $table->string('heading_2_en', 100)->nullable();
            $table->json('sections')->nullable();
            $table->json('sections_en')->nullable();
            $table->datetime('created_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_infobase');
    }
};
