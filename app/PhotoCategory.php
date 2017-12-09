<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    public $fillable = ["name"];

    public function photos()
    {
        return $this->hasMany("App\Photo");
    }
}
