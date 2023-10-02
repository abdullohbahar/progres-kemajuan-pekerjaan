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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->nullOnDelete(); // id user
            $table->foreignUuid('task_report_id')->nullable()->constrained('task_reports')->nullOnDelete(); // id detail pekerjaan
            $table->string('week');
            $table->string('role');
            $table->enum('status', ['Setujui', 'Tolak']);
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
        Schema::dropIfExists('agreements');
    }
};
