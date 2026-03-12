<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // 🔥 TAMBAHKAN INI

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'title',
    'description',
    'image_path',
    'commission_price_id',
    'style',
    'category',
    'placement',
    'is_featured',
    'sort_order'
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function price()
    {
        return $this->belongsTo(CommissionPrice::class, 'commission_price_id');
    }

    public function placements()
{
    return $this->belongsToMany(ImagePlacement::class);
}

public function imagePlacements()
{
    return $this->belongsToMany(
        ImagePlacement::class,
        'image_placement_artwork',
        'artwork_id',
        'image_placement_id'
    );
}
}
