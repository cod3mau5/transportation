<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordpressPostMeta extends Model
{
    protected $connection = 'wordpress';
    protected $table = 'postmeta';
    public $timestamps = false;

    protected $fillable = ['post_id', 'meta_key', 'meta_value'];
}
