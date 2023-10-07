<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementTaskReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_report_id', // id konsultan pengawas
        'supervising_consultant_id', // id konsultan pengawas
        'partner_id', // id rekanan
        'site_supervisor_id_1', // id pengawas lapangan 1
        'site_supervisor_id_2', // id pengawas lapangan 2
        'acting_commitment_marker_id', // id ppk
        'is_agree',
        'information'
    ];

    public function taskReport()
    {
        return $this->belongsTo(TaskReport::class);
    }
}
