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
        Schema::create('mc_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('task_report_id')->nullable()->constrained('task_reports')->nullOnDelete();
            $table->foreignUuid('kind_of_work_detail_id')->nullable()->constrained('kind_of_work_details')->nullOnDelete(); // id detail pekerjaan
            $table->string('total_mc')->nullable();
            $table->string('name')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
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
        Schema::dropIfExists('mc_histories');
    }
};
