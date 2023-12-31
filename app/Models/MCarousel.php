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
        'sections',
        'heading_sm_en',
        'heading_lg_en',
        'heading_md_en',
        'description_en',
        'bgimage',
        'bgvideo',
        'sort',
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
            'sections',
            'bgimage',
            'bgvideo'
        );

    }

    public function scopeId($query){
        return $query->select(
            'id',
            'heading_sm',
            'heading_lg',
            'heading_md',
            'description',
            'sections',
            'bgimage',
            'bgvideo'
        );

    }

    public function moveUp($siteId)
    {
        $currentSortOrder = $this->sort;

        // Get the row above
        $rowAbove = self::where('site_id',$siteId)
            ->where('sort', '<', $currentSortOrder)
            ->orderByDesc('sort')
            ->first();

        if ($rowAbove) {
            // Swap the sort orders
            $this->update(['sort' => $rowAbove->sort]);
            $rowAbove->update(['sort' => $currentSortOrder]);
        }
    }

    public function moveDown($siteId)
    {
        $currentSortOrder = $this->sort;

        // Get the row below
        $rowBelow = self::where('site_id',$siteId)
            ->where('sort', '>', $currentSortOrder)
            ->orderBy('sort')
            ->first();

        if ($rowBelow) {
            // Swap the sort orders
            $this->update(['sort' => $rowBelow->sort]);
            $rowBelow->update(['sort' => $currentSortOrder]);
        }
    }

}
