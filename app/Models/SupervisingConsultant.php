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
        'user_id',
    ];

    public function cvConsultant()
    {
        return $this->belongsTo(CvConsultant::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
