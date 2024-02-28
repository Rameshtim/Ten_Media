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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->text('description');

			//Foreign key for company
			$table->unsignedBigInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies')->on('companies');
			
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
