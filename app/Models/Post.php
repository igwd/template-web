<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
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
        'published_at',
        'created_by',
        'updated_by'
    ];

    public $timestamps = true;

    /* protected $dates = ['deleted_at']; */

    public function user_created(){
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function user_updated(){
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('title_en', 'like', '%'.$search.'%');
        })
        ->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', '=', $status);
        });
    }
}
