<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'username',
        'phone_number',
        'card_no_start',
        'card_no_end',
        'nid_no',
        'division_id',
        'zila_id',
        'upzila_id',
        'union_id',
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
