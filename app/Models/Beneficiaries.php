<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'nid',
        'phone_number',
        'photo',
        'card_no',
        'division_id',
        'zila_id',
        'upozila_id',
        'union_id',
        'ward_id',
        'village_id',
        'status'
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
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
