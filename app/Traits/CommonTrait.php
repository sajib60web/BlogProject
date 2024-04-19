<?php
namespace App\Traits;

use App\Models\Upload;
use Image;
trait CommonTrait
{
    public function uploadFile($folder='',$requestFile,$id='',$weight=300,$height=300,$quality=100){

        $info         = getimagesize($requestFile);
        $fileType     = strtolower(image_type_to_extension($info[2]));
        $fileType     = explode('.', $fileType);
        $fileType     = $fileType[1];

        if ($fileType == 'jpg') {
            $fileType = 'jpeg';
        }
        $convertMethod     = 'imagecreatefrom' . $fileType;

        $originalImageName = $this->imageName('original', $fileType);
        $slesh = isset($folder)? '/':'';
        $originalImageUrl  = public_path($folder).$slesh. $originalImageName;
        $db_image_url      = $folder.$slesh. $originalImageName;
        // $image = Image::make($convertMethod($requestFile))->resize($weight, $height)->save($originalImageUrl,$quality);
        $image = Image::make($convertMethod($requestFile))->save($originalImageUrl,$quality);

        $upload = Upload::find($id);
        if(!blank($id) && $upload && file_exists($upload->original)):
            unlink($upload->original);
        endif;

        if(!$upload):
            $upload  = new Upload();
        endif;
        $upload->original = $db_image_url;
        $upload->save();
        return $upload->id??null;

    }

    private function imageName($size, $fileType)
    {
        $purpose = substr(0, 20) . $size . '.' . $fileType;
        $purpose = str_replace(" ", "-", $purpose);
        $purpose = date('Y-m-d') . '-' . strtolower(\Str::random(12)) . '-' . $purpose;

        return $purpose;

    }

}
