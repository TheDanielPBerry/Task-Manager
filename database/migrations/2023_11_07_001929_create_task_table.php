<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
		{ Schema::create('projects', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->longText('description');
			$table->timestamps();
		});

		Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->foreignId('project_id')->constrained()->onDelete('cascade');
			$table->string('title');
			$table->integer('priority');
			$table->integer('status');
			$table->longText('description');
			$table->integer('sortOrder')->default(0);
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tasks');
		Schema::dropIfExists('projects');
	}
}
