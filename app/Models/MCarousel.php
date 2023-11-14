<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MCarousel extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "m_carousel";

    protected $primaryKey = "id";

    protected $fillable = [
        'heading_sm',
        'heading_lg',
        'heading_md',
        'description',
        'section',
        'heading_sm_en',
        'heading_lg_en',
        'heading_md_en',
        'description_en',
        'section_en',
        'bgimage',
        'site_id',
        'created_by',
        'updated_by'
    ];

    public $timestamps = true;

    protected $hidden = ['site_id','created_at','created_by','updated_at','updated_by','deleted_at'];

    public function site(){
        return $this->belongsTo('App\Models\Site', 'site_id', 'id');
    }

    public function scopeEn($query){
        return $query->select(
            'id',
            'heading_sm_en as heading_sm',
            'heading_lg_en as heading_lg',
            'heading_md_en as heading_md',
            'description_en as description',
            'section_en as section',
            'bgimage'
        );

    }

    public function scopeId($query){
        return $query->select(
            'id',
            'heading_sm',
            'heading_lg',
            'heading_md',
            'description',
            'section',
            'bgimage'
        );

    }

}
