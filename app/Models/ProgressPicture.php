<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'picture',
        'week'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
