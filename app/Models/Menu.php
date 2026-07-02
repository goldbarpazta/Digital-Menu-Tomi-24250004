<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $fillable = [
        'nama_menu',
        'slug',
        'kategori',
        'harga',
        'status',
        'rating',
        'foto',
        'komposisi',
        'kalori',
        'protein',
        'lemak',
        'karbohidrat',
        'deskripsi',
    ];

    protected static function booted(): void
    {
        static::creating(function (Menu $menu) {
            if (empty($menu->slug)) {
                $menu->slug = Str::slug($menu->nama_menu);
            }
        });
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function scopeReady($query)
    {
        return $query->where('status', 'Ready');
    }

    public function scopeSoldOut($query)
    {
        return $query->where('status', 'Sold Out');
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
