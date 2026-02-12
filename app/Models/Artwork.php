<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_path',
        'commission_price_id',
    ];

    /**
     * Artwork belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Artwork has one commission price
     */
    public function price()
    {
        return $this->belongsTo(CommissionPrice::class, 'commission_price_id');
    }
}
