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

    public function accept()
    {
        if ($this->status == "active") return;

        $this->status = "active";

        return $this->save();
    }

    public function refuse()
    {
        if ($this->status == "refused") return;

        $this->status = "refused";

        return $this->save();
    }
}
