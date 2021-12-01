<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $table   = 'resorts';

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function reservations()
    {
        return $this->belongsTo('App\Reservation');
    }
}
