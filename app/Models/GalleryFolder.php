<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GalleryFolder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover_image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($folder) {
            if (empty($folder->slug)) {
                $baseSlug = Str::slug($folder->name);
                if (empty($baseSlug)) {
                    $baseSlug = 'folder';
                }
                $slug = $baseSlug;
                $counter = 1;
                // Check withTrashed() so unique constraint in MySQL is never violated
                while (static::withTrashed()->where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                $folder->slug = $slug;
            }
        });
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class, 'folder_id');
    }

    public function getEffectiveCoverAttribute()
    {
        if ($this->cover_image) {
            return $this->cover_image;
        }

        $firstImg = $this->images()->first();
        return $firstImg ? $firstImg->image_path : null;
    }
}
