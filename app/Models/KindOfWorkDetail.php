<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOfWorkDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'kind_of_work_id',
        'name',
        'information',
        'contract_volume',
        'contract_unit',
        'contract_unit_price',
        'total_contract_price',
        'mc_volume',
        'mc_unit',
        'mc_unit_price',
        'total_mc_price',
        'work_value',
    ];

    public function kindOfWork()
    {
        return $this->belongsTo(KindOfWork::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function agreement()
    {
        return $this->hasMany(Agreement::class);
    }

    public function timeSchedules()
    {
        return $this->hasMany(TimeSchedule::class);
    }

    public function timeScheduleHistory()
    {
        return $this->hasMany(TimeScheduleHistory::class);
    }

    public function mcHistory()
    {
        return $this->hasMany(McHistory::class);
    }
}
