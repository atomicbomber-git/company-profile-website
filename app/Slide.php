<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public $fillable = ["caption", "description", "image"];

    public function getCreatedAtAttribute($date) {
        return new Date($date);
    }
}
