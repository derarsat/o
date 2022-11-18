<?php

namespace App\Helper;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait File
{


    public function imageFile($file, $path): string
    {
        $public_path = "/public/images/uploads/";
        $storage_path = "/storage/images/uploads/";

        if ($file) {
            $extension       = $file->getClientOriginalExtension();
            $file_name       = $path . '-' . Str::random(30) . '.' . $extension;
            $url             = $file->storeAs($public_path, $file_name);
            $public_path     = public_path($storage_path . $file_name);
            $img             = Image::make($file);
            $url             = preg_replace("/public/", "", $url);
            return $img->save($public_path) ? $url : '';
        }
    }

    public function pdfFile($file, $path): string
    {
        $public_path = "/public/pdf/uploads/";
        $storage_path = "/storage/pdf/uploads/";

        if ($file) {
            $extension       = $file->getClientOriginalExtension();
            $file_name       = $path . '-' . Str::random(30) . '.' . $extension;
            $url             = $file->storeAs($public_path, $file_name);
            $url             = preg_replace("/public/", "", $url);
            return $url;
        }
    }
}
