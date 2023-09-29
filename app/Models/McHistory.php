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
        'mc_volume',
        'mc_unit',
        'mc_unit_price',
        'total_mc_price',
        'work_value',
    ];

    public function kindOfWorkDetail()
    {
        return $this->belongsTo(KindOfWorkDetail::class);
    }
}
