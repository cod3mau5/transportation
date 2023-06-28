<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResortImage extends Model
{
    use HasFactory;
    protected $fillable = ['name','image_path','category'];

    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }
}
