<?php

namespace App;

trait FileManegerTrat
{
    // ali.png
    // assets/images/ali.png
    protected function uploadFile($file, $dir = "../public/assets/images/")
    {
        $filePath = $dir . $file['name'];

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return str_replace("../public/","",$filePath);
        }

        return null;
    }
}