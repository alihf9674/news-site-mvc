<?php

namespace System\Services\image;
class ImageService
{
    protected $path;

    public function save($image)
    {
        $imageName = self::setImageName($image);
        $imagePath = 'public/' . $this->path . '/';
        $imageTmp = $image['tmp_name'];
        if (!is_uploaded_file($imageTmp)) {
            return false;
        } else {
            if (move_uploaded_file($imageTmp, $imagePath . $imageName))
                return $imagePath . $imageName;
        }
    }

    public function unset($path)
    {
        $path = trim($path, '/');
        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function setImageName($image): string
    {
        $extension = explode('/', $image['type'])[1];
        return date("Y-m-d-H-i-s") . '.' . $extension;
    }
}