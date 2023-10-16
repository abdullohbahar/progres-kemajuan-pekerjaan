<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind_of_work_detail_id',
        'week',
        'date',
        'progress',
        'is_site_supervisor_agree'
    ];

    public function kindOfWorkDetail()
    {
        return $this->belongsTo(KindOfWorkDetail::class);
    }

    public function progressPictures()
    {
        return $this->hasMany(ProgressPicture::class);
    }
}
