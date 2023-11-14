<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "m_site";

    protected $primaryKey = "id";

    //id  slug    name    description  section  created_at  created_by  updated_at  updated_by  deleted_at
    protected $fillable = [
        'slug',
        'name',
        'logo',
        'side_logo_1',
        'side_logo_2',
        'header',
        'header_en',
        'sub_header',
        'sub_header_en',
        'description',
        'sections',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true;

    public function scopeId($query){
        return $query->select(
            'id',
            'slug',
            'name',
            'header',
            'sub_header',
            'description',
            'sections',
            'logo'
        );
    }

    public function scopeEn($query){
        return $query->select(
            'id',
            'slug',
            'name',
            'header_en as header',
            'sub_header_en as sub_header',
            'description_en as description',
            'sections',
            'logo'
        );
    }

    public function navigations(){
        return $this->hasMany(Navigation::class, 'site_id', 'id');
    }
}
