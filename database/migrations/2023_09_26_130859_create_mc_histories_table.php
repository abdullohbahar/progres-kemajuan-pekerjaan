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
            $table->string('mc_volume')->nullable()->default(0); // volume mc
            $table->string('mc_unit')->nullable()->default(0); // unit mc
            $table->string('mc_unit_price')->nullable()->default(0); // harga satuan mc
            $table->string('work_value')->nullable()->default(0); // nilai pekerjaan mc
            $table->string('total_mc_price')->nullable()->default(0); // nilai pekerjaan mc
            $table->string('total_mc');
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
