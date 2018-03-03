<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'png,jpg']
        ];
    }

    /**
     * Загрузка картинки
     * @param UploadedFile $file
     * @param $currentImage
     * @return mixed
     */
    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;
        if($this->validate()){
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    /**
     * Удаление текущей картинки
     * @param $currentImage
     */
    public function deleteCurrentImage($currentImage)
    {
        if($this->fileExist($currentImage)){
            unlink($this->getFolder().$currentImage);
        }
    }

    /**
     * Путь к папке с картинками
     * @return string
     */
    private function getFolder()
    {
        return \Yii::getAlias('@web').'uploads/';
    }

    /**
     * Генерация имени картинки
     * @return string (сгенерированное имя картинки)
     */
    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)).'.'.$this->image->extension);
    }

    /**
     * Проверка картинки на существование
     * @param $currentImage
     * @return bool
     */
    private function fileExist($currentImage)
    {
        if (!empty($currentImage)){
            return file_exists($this->getFolder().$currentImage);
        }
    }

    /**
     * Сохранение картинки
     * @return string (имя картинки)
     */
    private function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder().$filename);
        return $filename;
    }
}