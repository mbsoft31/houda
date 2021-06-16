<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function hasTheme($theme)
    {
        return $this->themes()->where("themes.id", $theme->id)->count() > 0;
    }

    public function isThemeAvailable($theme)
    {
        $speciality = $this->speciality;
        return ($speciality->themes()->where("themes.id", $theme->id)->exists());
    }
}
