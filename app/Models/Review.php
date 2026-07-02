<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'menu_id',
        'nama',
        'rating',
        'komentar',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
