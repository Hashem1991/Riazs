<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $table = 'about_mes'; // গুরুত্বপূর্ণ

    protected $fillable = [
        'biography_id',
        'name',
        'title',
        'description',
        'image',

        'email',
        'phone',
        'address',

        'date_of_birth',
        'gender',
        'marital_status',
        'children_count',

        'blood_group',
        'donate_blood',

        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'website',
    ];
}