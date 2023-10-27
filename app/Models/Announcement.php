<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
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

    protected $casts = [
        'attachment' => 'array',
    ];

    public $timestamps = true;

}
