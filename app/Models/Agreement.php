<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_report_id',
        'kind_of_work_detail_id',
        'role',
        'week',
        'date',
        'progress',
        'status',
        'information'
    ];

    public function kindOfWorkDetail()
    {
        return $this->belongsTo(KindOfWorkDetail::class);
    }
}
