<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key','value'];

    public static function getValue($key)
    {
        return optional(self::where('key',$key)->first())->value;
    }
}