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
        Schema::create('task_reports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('activity_name');
            $table->text('task_name');
            $table->string('location')->default('Kabupaten Bantul');
            $table->year('fiscal_year'); // tahun kontrak
            $table->text('spk_number');
            $table->date('spk_date');
            $table->bigInteger('contract_value')->unsigned();
            $table->foreignUuid('supervising_consultant_id')->nullable()->constrained('supervising_consultants')->nullOnDelete(); // id konsultan pengawas
            $table->foreignUuid('partner_id')->nullable()->constrained('partners')->nullOnDelete(); // id rekanan
            $table->foreignUuid('site_supervisor_id_1')->nullable()->constrained('site_supervisors')->nullOnDelete(); // id pengawas lapangan 1
            $table->foreignUuid('site_supervisor_id_2')->nullable()->constrained('site_supervisors')->nullOnDelete(); // id pengawas lapangan 2
            $table->foreignUuid('site_supervisor_id_3')->nullable()->constrained('site_supervisors')->nullOnDelete(); // id pengawas lapangan 3
            $table->foreignUuid('acting_commitment_marker_id')->nullable()->constrained('acting_commitment_markers')->nullOnDelete(); // id PPK
            $table->enum('status', ['Aktif', 'SP 1', 'SCM 1', 'SCM 2', 'SCM 3'])->default('Aktif');
            $table->integer('execution_time');
            $table->boolean('contract_terminated')->nullable()->default(0);
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
        Schema::dropIfExists('task_reports');
    }
};
