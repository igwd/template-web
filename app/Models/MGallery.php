<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MGallery extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "m_gallery";

    protected $primaryKey = "id";

    protected $casts = ['media'=>'array'];

    public $timestamps = true;

    //id  slug    name    description  section  created_at  created_by  updated_at  updated_by  deleted_at
    protected $fillable = [
        'slug',
        'title',
        'description',
        'title_en',
        'description_en',
        'media_photo',
        'media_video',
        'media_video_thumb',
        'viewer',
        'published_at',
        'created_by',
        'updated_by',
        'deleted_at'
    ];

    protected $hidden = ['created_by','updated_by','deleted_at'];

    public function site(){
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function scopeEn($query){
        return $query->select(
            'slug',
            'title_en as title',
            'description_en as description',
            'media_photo',
            'media_video',
            'media_video_thumb',
            'viewer',
            'published_at',
            'published_at');
    }

    public function scopeId($query){
        return $query->select(
            'slug',
            'title',
            'description',
            'media_photo',
            'media_video',
            'media_video_thumb',
            'viewer',
            'published_at',
            'published_at');
    }

}
