<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'division_id',
        'zila_id',
        'upzila_id',
        'union_id',
        'month',
        'year',
        'dealer_id',
        'amount',
    ];
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function zila()
    {
        return $this->belongsTo(Zila::class);
    }

    public function upzila()
    {
        return $this->belongsTo(Upozila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
