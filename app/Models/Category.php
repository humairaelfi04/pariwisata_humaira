<?php

// 1. Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'humaira_categories';

    protected $fillable = [
        'nama_kategori',
        'jenis_kategori'
    ];

    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class, 'category_id');
    }

    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class, 'category_id');
    }
}
