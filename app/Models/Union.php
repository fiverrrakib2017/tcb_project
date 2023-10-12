<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function division(){
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function zila(){
        return $this->belongsTo(Zila::class, 'zila_id', 'id');
    }
    public function upzila(){
        return $this->belongsTo(Upozila::class, 'upozila_id', 'id');
    }
}
