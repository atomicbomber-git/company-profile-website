<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Photo extends Model
{
    protected $fillable = ["name", "image", "category_id"];

    public function getCreatedAtAttribute($date) {
        return new Date($date);
    }

    public function getThumbnailAttribute() {
        return config("files.thumbnail.location") . "/" . $this->image;
    }

    public function formattedDate()
    {
        return $this->created_at->format("j F Y");
    }

    public function category()
    {
        return $this->belongsTo("App\PhotoCategory")->withDefault(["name" => "Tidak Berkategori", "id" => ""]);
    }
}
