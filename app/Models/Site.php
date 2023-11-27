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
        'is_main_site',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $hidden = ['is_active','created_by','updated_by','deleted_at'];

    protected $casts = [
        'is_main_site' => 'boolean',
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
        )->where('is_active',1);
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
        )->where('is_active',1);
    }

    public function navigations(){
        return $this->hasMany(Navigation::class, 'site_id', 'id');
    }
}
