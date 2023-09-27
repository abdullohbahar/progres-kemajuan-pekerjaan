<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeScheduleHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind_of_work_detail_id',
        'task_report_id',
        'week',
        'from',
        'to',
    ];

    public function kindOfWorkDetail()
    {
        return $this->belongsTo(KindOfWorkDetail::class);
    }
}
