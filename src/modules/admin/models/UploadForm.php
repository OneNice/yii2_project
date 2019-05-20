<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 12.05.2019
 * Time: 21:34
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}