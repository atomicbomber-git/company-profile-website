<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public $fillable = ["caption", "description"];
}
