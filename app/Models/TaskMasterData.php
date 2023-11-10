<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaskMasterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'division_master_data_id'
    ];

    public function division(): HasOne
    {
        return $this->hasOne(DivisionMasterData::class, 'id', 'division_master_data_id');
    }
}
