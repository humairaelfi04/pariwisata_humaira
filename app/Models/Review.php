<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $table = 'humaira_reviews';

    protected $fillable = [
        'humaira_destination_id',
        'nama_pengunjung',
        'email_pengunjung',
        'rating',
        'komentar',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'humaira_destination_id');
    }

}

