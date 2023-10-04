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
            $table->foreignUuid('kind_of_work_detail_id')->nullable()->constrained('kind_of_work_details')->nullOnDelete(); // id detail pekerjaan
            $table->string('role');
            $table->string('week');
            $table->string('date');
            $table->string('progress');
            $table->enum('status', ['Awal', 'Disetujui Rekanan', 'Ditolak Rekanan', 'Disetujui Pengawas Lapangan 1', 'Ditolak Pengawas Lapangan 1', 'Disetujui Pengawas Lapangan 2']);
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
