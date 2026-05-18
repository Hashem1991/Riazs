<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'image',
        'email',
        'phone',
        'years',
        'type',
    ];

    public function educations()
{
    return $this->hasMany(Education::class);
}

public function researches()
{
   return $this->hasMany(Research::class, 'biography_id');
}

public function expertises()
{
    return $this->hasMany(Expertise::class);
}
}