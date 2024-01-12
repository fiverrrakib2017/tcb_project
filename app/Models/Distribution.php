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
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiaries::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function zila()
    {
        return $this->belongsTo(Zila::class);
    }

    public function upozila()
    {
        return $this->belongsTo(Upozila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }
    
}
