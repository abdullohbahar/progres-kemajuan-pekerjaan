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
            $table->foreignUuid('supervising_consultant_id')->nullable()->constrained('supervising_consultants')->nullOnDelete(); // id konsultan pengawas
            $table->foreignUuid('partner_id')->nullable()->constrained('partners')->nullOnDelete(); // id rekanan
            $table->foreignUuid('site_supervisor_id_1')->nullable()->constrained('site_supervisors')->nullOnDelete(); // id pengawas lapangan 1
            $table->foreignUuid('site_supervisor_id_2')->nullable()->constrained('site_supervisors')->nullOnDelete(); // id pengawas lapangan 2
            $table->foreignUuid('acting_commitment_marker_id')->nullable()->constrained('acting_commitment_markers')->nullOnDelete(); // id PPK
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
