<?php

namespace Validators;
class Image
{
    public static function uploadFile($request, $uploadDirectory): void
    {
        if (isset($_FILES['img_photo']) && $_FILES['img_photo']['error'] === UPLOAD_ERR_OK) {
            $avatar = $_FILES['img_photo'];
            $filename = $uploadDirectory . basename($avatar['name']);
            if (move_uploaded_file($avatar['tmp_name'], $filename)) {
                $request->set('img_photo', $filename);
            }
        }
    }
}


