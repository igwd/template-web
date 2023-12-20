<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MAnnouncement extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "m_post";

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
        'tags',
        'tags_en',
        'attachment',
        'published_at',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        'created_by','updated_by','deleted_at'
    ];

    protected $casts = [
        'attachment' => 'array',
    ];

    public $timestamps = true;

    public function user_created(){
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function user_updated(){
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function site(){
        return $this->belongsTo('App\Models\Site','site_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function scopeEn($query,$category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);   
        }
        return $query->select(
            'slug_en as slug',
            'thumbnail',
            'thumbnail_meta_en as thumbnail_meta',
            'title_en as title',
            'content_en as content',
            'tags_en as tags',
            'attachment',
            'category_id',
            'published_at')
            ->orderBy('published_at','desc');
    }

    public function scopeId($query,$category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);   
        }
        return $query->select(
            'slug',
            'thumbnail',
            'thumbnail_meta',
            'title',
            'content',
            'tags',
            'attachment',
            'category_id',
            'published_at')
            ->orderBy('published_at','desc');
    }    
}
