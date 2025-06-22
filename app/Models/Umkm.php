<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'humaira_umkms';

    protected $fillable = [
        'nama_usaha',
        'deskripsi_layanan',
        'narahubung',
        'nomor_telepon',
        'alamat_umkm',
        //'status_persetujuan',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
