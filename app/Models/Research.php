<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        'biography_id',
        'title',
        'journal',
        'year',
        'link',
        'description',
    ];

    // =========================
    // RELATION FIXED
    // =========================

    public function biography()
    {
        return $this->belongsTo(Biography::class, 'biography_id');
    }
}