<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOfWork extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'task_id',
        'name',
    ];

    public function kindOfWorkDetails()
    {
        return $this->hasMany(KindOfWorkDetail::class);
    }

    public function task()
    {
        return $this->belongsTo(TaskReport::class);
    }
}
