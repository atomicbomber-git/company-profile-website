<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    public $fillable = ["name"];

    public function photos()
    {
        return $this->hasMany("App\Photo", "category_id");
    }

    public function delete() {
        foreach ($this->photos as $photo) {
            $photo->update(["category_id" => null]);
        }

        parent::delete();
    }
}
