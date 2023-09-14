<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisingConsultant extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'phone_number',
        'cv_consultant_id',
        'position',
    ];

    public function cvConsultant()
    {
        return $this->belongsTo(CvConsultant::class);
    }
}
