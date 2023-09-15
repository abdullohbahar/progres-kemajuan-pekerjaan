<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ActingCommitmentMarker;
use App\Models\CvConsultant;
use App\Models\Partner;
use App\Models\SiteSupervisor;
use App\Models\SupervisingConsultant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CvConsultant::factory(5)->create();
        SupervisingConsultant::factory(5)->create();
        Partner::factory(5)->create();
        SiteSupervisor::factory(5)->create();
        ActingCommitmentMarker::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
