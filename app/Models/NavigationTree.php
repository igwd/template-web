<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationTree extends Model
{
    use HasFactory;

    protected $table = "m_navigation_tree";

    protected $fillable = [
        'site_id',
        'parent',
        'name',
        'name_en',
        'sort',
        'link',
        'external_link',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['site_id','created_at','created_by','updated_at','updated_by','sort'];

    public $timestamps = true;

    public function site(){
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function nav_parent(){
        return $this->belongsTo(Navigation::class, 'parent','id','inner');
    }

    public function nav_children(){
        return $this->hasMany(Navigation::class, 'parent');
    }

    public function scopeEn($query){
        return $query->select("id","parent",'name_en as name','sort','link')->orderBy('sort');
    }
    public function scopeId($query){
        return $query->select("id","parent",'name','sort','link')->orderBy('sort');
    }
}
