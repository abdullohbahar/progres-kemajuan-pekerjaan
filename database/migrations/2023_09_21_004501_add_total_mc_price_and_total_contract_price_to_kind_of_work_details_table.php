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
        Schema::table('kind_of_work_details', function (Blueprint $table) {
            $table->bigInteger('total_contract_price')->nullable()->after('contract_unit_price');
            $table->text('total_mc_price')->nullable()->after('mc_unit_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kind_of_work_details', function (Blueprint $table) {
            //
        });
    }
};
