<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionPrice extends Model
{
    protected $table = 'commission_prices';

    protected $fillable = [
        'title',
        'price_from',
        'price_to',
        'description',
        'is_active',
        'sort_order',
    ];

    /**
     * One price can be used by many artworks
     */
    public function artworks()
    {
        return $this->hasMany(Artwork::class, 'commission_price_id');
    }

    /**
     * Helper: formatted price
     */
    public function getPriceLabelAttribute()
    {
        if ($this->price_to) {
            return 'Rp ' . number_format($this->price_from) . ' – ' . number_format($this->price_to);
        }

        return 'Rp ' . number_format($this->price_from);
    }
}
