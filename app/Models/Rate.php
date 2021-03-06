<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_id',
        'zone_id',
        'oneway',
        'roundtrip',
    ];
    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }
}
