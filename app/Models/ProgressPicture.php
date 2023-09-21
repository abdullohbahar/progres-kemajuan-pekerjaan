<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'picture'
    ];

    public function kindOfWorkDetail()
    {
        return $this->belongsTo(KindOfWorkDetail::class);
    }
}
