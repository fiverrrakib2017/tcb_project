<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'beneficiary_id',
        'status',
        'distribution_date',
        'division_id',
        'zila_id',
        'upozila_id',
        'union_id',
        'ward_id',
    ];
}
