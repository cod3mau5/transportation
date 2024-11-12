<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordpressPost extends Model
{
    protected $connection = 'wordpress';
    protected $table = 'posts';
    // Alcance para publicaciones en estado "publicado"
    public function scopePublished($query)
    {
        return $query->where('post_status', 'publish');
    }

    // Alcance para publicaciones en estado "borrador"
    public function scopeDraft($query)
    {
        return $query->where('post_status', 'draft');
    }

    // Alcance para publicaciones en estado "pendiente"
    public function scopePending($query)
    {
        return $query->where('post_status', 'pending');
    }

    // Alcance para publicaciones en estado "privado"
    public function scopePrivate($query)
    {
        return $query->where('post_status', 'private');
    }


    // Relación con wp_postmeta
    public function meta()
    {
        return $this->hasMany(WordpressPostMeta::class, 'post_id');
    }

    // Obtener el excerpt
    public function getExcerptAttribute()
    {
        return $this->post_excerpt;
    }

    // Obtener la meta descripción (para Yoast SEO)
    public function getMetaDescriptionAttribute()
    {
        return optional($this->meta->where('meta_key', '_yoast_wpseo_metadesc')->first())->meta_value;
    }
}

