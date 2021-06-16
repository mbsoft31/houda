<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
