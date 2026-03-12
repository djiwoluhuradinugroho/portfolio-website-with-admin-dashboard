<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePlacement extends Model
{
    protected $fillable = [
        'key',
        'label'
    ];

    public function artworks()
{
    return $this->belongsToMany(
        Artwork::class,
        'image_placement_artwork',
        'image_placement_id',
        'artwork_id'
    );
}
}
