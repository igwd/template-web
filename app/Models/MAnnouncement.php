<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MAnnouncement extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "m_announcement";

    protected $primaryKey = "id";

    protected $fillable = [
        'slug',
        'slug_en',
        'thumbnail',
        'thumbnail_meta',
        'thumbnail_meta_en',
        'title',
        'title_en',
        'content',
        'content_en',
        'category_id',
        'attachment',
        'published_at',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'id','created_by','updated_by','deleted_at'
    ];

    protected $casts = [
        'attachment' => 'array',
    ];

    public $timestamps = true;

    public function scopeId($query){
        return $query->select(
            'slug',
            'thumbnail',
            'thumbnail_meta',
            'title',
            'content',
            'attachment'
        );
    }

    public function scopeEn($query){
        return $query->select(
            'slug',
            'thumbnail',
            'thumbnail_meta_en as thumbnail',
            'title_en as title',
            'content_en as content',
            'attachment'
        );
    }    
}
