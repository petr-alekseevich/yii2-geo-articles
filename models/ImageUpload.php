<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{

    public $image;


    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png'],
        ];
    }

    public function uploadFile($file, $currentImage, $articleId)
    {
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage($articleId);
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/titleImage/';
    }

    private function generateFilename($articleId)
    {
        return 'id-' . $articleId . '_' . date('Y-m-d_H-i-s') . '.' . $this->image->extension;
    }

    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if (!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage($articleId)
    {
        $filename = $this->generateFileName($articleId);

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}