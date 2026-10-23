<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'folder_id',
        'title',
        'image_path',
        'category',
    ];

    public function folder()
    {
        return $this->belongsTo(GalleryFolder::class, 'folder_id');
    }
}
