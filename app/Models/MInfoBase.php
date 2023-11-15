<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MInfoBase extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "m_infobase";

    protected $fillable = [
        'site_id',
        'background',
        'heading_1',
        'heading_1_en',
        'heading_2',
        'heading_2_en',
        'sections',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['id','site_id','created_at','created_by','updated_at','updated_by','deleted_at'];

    public $timestamps = true;

    public function site(){
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function scopeEn($query){
        return $query->select("background","heading_1_en as heading_1","heading_2_en as heading_2","sections");
    }

    public function scopeId($query){
        return $query->select("background","heading_1","heading_2","sections");
    }
}
