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
        'bgimage',
        'site_id',
        'created_by',
        'updated_by'
    ];

    public $timestamps = true;

    public function sectionOwner(){
        return $this->belongsTo('App\Models\Site', 'site_id', 'id');
    }

}
