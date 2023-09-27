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
        Schema::table('time_schedule_histories', function (Blueprint $table) {
            $table->foreignUuid('task_report_id')->after('kind_of_work_detail_id')->nullable()->constrained('task_reports')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_schedule_histories', function (Blueprint $table) {
            //
        });
    }
};
