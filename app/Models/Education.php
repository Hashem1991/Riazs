<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations'; // 🔥 এইটা add কর

    protected $fillable = [
    'biography_id',
    'degree',
    'institution',
    'result',
    'year',
    'description'
];
    public function biography()
    {
        return $this->belongsTo(Biography::class);
    }
}