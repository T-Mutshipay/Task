<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // id (PK)
            $table->foreignId('task_id')->nullable()->constrained('tasks'); // FK vers tasks, nullable si pas lié
            $table->string('name'); // name
            $table->string('file_path'); // file_path
            $table->foreignId('uploaded_by')->constrained('users'); // FK vers users
            $table->timestamps(); // uploaded_at (created_at et updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}