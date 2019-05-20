<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tops".
 *
 * @property int $id
 * @property string $image
 * @property int $pizza_id
 *
 * @property Pizza $pizza
 */
class Tops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'pizza_id'], 'required'],
            [['pizza_id'], 'integer'],
            [['pizza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::className(), 'targetAttribute' => ['pizza_id' => 'id']],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $name = $this->getUnusedRandomFileName($this->image->extension);
            $this->image->saveAs('img/upload/' . $name);
            return $name;
        } else {
            return false;
        }
    }

    private function getUnusedRandomFileName($ext) {
        do {
            $name = uniqid('Upload_', true) . '.' . $ext;
        } while (file_exists('/web/img/upload/' . $name));

        return $name;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Изображение',
            'pizza_id' => 'Продукт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPizza()
    {
        return $this->hasOne(Pizza::className(), ['id' => 'pizza_id']);
    }
}
