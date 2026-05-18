<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'biography_id',
        'degree',
        'institution',
        'result',
        'year',
        'description'
    ];

    // =========================
    // RELATION FIXED
    // =========================

    public function biography()
    {
        return $this->belongsTo(Biography::class, 'biography_id');
    }
}