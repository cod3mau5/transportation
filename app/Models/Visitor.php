<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id'];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
