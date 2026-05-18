<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
    'biography_id',
    'title',
    'description',
    'experience',
    'type',
];

    public function biography()
    {
        return $this->belongsTo(Biography::class);
    }

}
