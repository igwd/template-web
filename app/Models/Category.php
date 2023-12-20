<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "m_category";

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'slug',
        'category',
        'components'
    ];
}
