<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind_of_work_detail_id',
        'from_mc_volume',
        'to_mc_volume',
        'from_mc_unit',
        'to_mc_unit',
        'from_mc_unit_price',
        'to_mc_unit_price',
    ];
}
