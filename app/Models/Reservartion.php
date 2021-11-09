<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Reservartion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function resort()
    {
        return $this->belongsTo('App\Resort');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
