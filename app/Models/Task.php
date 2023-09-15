<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'activity_name',
        'task_name',
        'location',
        'fiscal_year', // tahun
        'spk_number',
        'spk_date',
        'contract_value',
        'supervising_consultant_id', // id konsultan pengawas
        'partner_id', // id rekanan
        'site_supervisor_id_1', // id pengawas lapangan 1
        'site_supervisor_id_2', // id pengawas lapangan 2
        'acting_commitment_marker_id', // id ppk
        'status',
    ];
}
