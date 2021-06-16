<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }
}
