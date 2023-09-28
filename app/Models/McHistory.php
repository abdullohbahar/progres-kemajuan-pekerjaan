<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_report_id',
        'kind_of_work_detail_id',
        'total_mc',
        'name',
        'from',
        'to',
    ];
}
