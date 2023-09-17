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
        'mc_volume',
        'mc_unit',
        'mc_unit_price',
    ];

    public function kindOfWork()
    {
        return $this->hasMany(KindOfWork::class, 'kind_of_work_id', 'id');
    }
}
