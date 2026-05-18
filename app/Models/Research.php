<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches'; // 🔥 THIS IS MISSING

    protected $fillable = [
        'biography_id',
        'title',
        'journal',
        'year',
        'link',
        'description',
    ];

    public function biography()
    {
        return $this->belongsTo(Biography::class);
    }
}