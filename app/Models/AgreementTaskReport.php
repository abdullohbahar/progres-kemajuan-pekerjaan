<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementTaskReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_report_id', // id konsultan pengawas
        'role',
        'role_id',
        'is_agree',
        'information'
    ];

    public function taskReport()
    {
        return $this->belongsTo(TaskReport::class);
    }
}
