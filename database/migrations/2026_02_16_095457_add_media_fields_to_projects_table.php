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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('featured_image')->nullable()->after('description');
            $table->json('gallery_images')->nullable()->after('featured_image');
            $table->string('video_url')->nullable()->after('gallery_images');
            $table->string('brochure_pdf')->nullable()->after('video_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['featured_image', 'gallery_images', 'video_url', 'brochure_pdf']);
        });
    }
};
