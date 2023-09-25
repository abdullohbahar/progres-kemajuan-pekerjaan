<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvConsultant extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'phone_number',
        'address'
    ];

    public function supervisingConsultants()
    {
        return $this->hasMany(SupervisingConsultant::class);
    }
}
