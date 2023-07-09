<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','meta_description','start_times','end_times','includes','cost'];

    public function images()
    {
        return $this->hasMany(TourImg::class);
    }
}
