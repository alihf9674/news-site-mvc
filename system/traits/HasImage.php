<?php

namespace System\Traits;

trait HasImage
{
      protected function saveImage($image)
      {
            $extension = explode('/', $image['type'])[1];
            $imageName = date("Y-m-d-H-i-s") . '.' . $extension; 
            $imageTmp = $image['tmp_name'];
            $imagePath = 'public/images/';
            
            if (is_uploaded_file($imageTmp)) {
                  if (move_uploaded_file($imageTmp, $imagePath . $imageName)) 
                        return $imagePath . $imageName; 
            } else return false;

      }

      protected function removeImage($path)
      {
            $path = trim($path, '/');
            if (file_exists($path)) {
                  unlink($path);
            }
      }

    protected function saveBanner($image)
    {
        $extension = explode('/', $image['type'])[1];
        $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
        $imageTmp = $image['tmp_name'];
        $imagePath = 'public/banners/';

        if (is_uploaded_file($imageTmp)) {
            if (move_uploaded_file($imageTmp, $imagePath . $imageName))
                return $imagePath . $imageName;
        } else return false;
    }

}
