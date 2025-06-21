<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'humaira_destinations';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'harga_tiket',
        'jam_operasional',
        'status_publikasi',
        'url_gambar_utama',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'humaira_destination_id');
    }
}
