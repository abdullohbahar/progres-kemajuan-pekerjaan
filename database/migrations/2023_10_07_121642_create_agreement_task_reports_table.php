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
        Schema::create('agreement_task_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('task_report_id')->nullable()->constrained('task_reports')->nullOnDelete(); // id detail pekerjaan
            $table->string('role');
            $table->string('role_id');
            $table->boolean('is_agree')->nullable();
            $table->text('information')->nullable();
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
        Schema::dropIfExists('agreement_task_reports');
    }
};
