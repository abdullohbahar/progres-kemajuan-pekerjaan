<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActingCommitmentMarker extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'phone_number',
        'nip',
        'position',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
