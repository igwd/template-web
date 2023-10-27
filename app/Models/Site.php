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
        'description',
        'section',
        'created_by',
        'updated_by',
    ];

    public $timestamps = true;
}
