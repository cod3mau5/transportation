<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImg extends Model
{
    use HasFactory;

    protected $fillable = ['name','image_path','category'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
