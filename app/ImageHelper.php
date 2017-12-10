<?php

namespace App;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ImageHelper {
    public static function storeImage($image)
    {
        $filename = $image->store(config("files.location.photo"));

        /* Creates a thumbnail from image and stores it */
        Image::load($image)
            ->fit(Manipulations::FIT_FILL, config("files.thumbnail.width"), config("files.thumbnail.height"))
            ->background("000000")
            ->optimize()
            ->save(storage_path("app/" . config("files.thumbnail.location") . "/" . $filename));

        return $filename;
    }
}