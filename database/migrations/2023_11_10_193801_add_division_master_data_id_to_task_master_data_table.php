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
        Schema::table('task_master_data', function (Blueprint $table) {
            $table->foreignId('division_master_data_id')->after('unit')->nullable()->constrained('division_master_data')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_master_data', function (Blueprint $table) {
            //
        });
    }
};
