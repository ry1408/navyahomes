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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('plot_number');
            $table->decimal('area_sqft', 12, 2);
            $table->decimal('total_price', 15, 2)->default(0);
            $table->enum('status', ['available', 'booked', 'sold'])->default('available');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            
            // Add unique constraint for plot_number within a project
            $table->unique(['project_id', 'plot_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plots');
    }
};
