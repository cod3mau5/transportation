<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_id', 'device', 'browser', 'referer', 'location'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
