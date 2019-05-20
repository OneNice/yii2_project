<?php

namespace app\models;

use Yii;

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
            [['image'], 'string'],
            [['pizza_id'], 'integer'],
            [['pizza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::className(), 'targetAttribute' => ['pizza_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'pizza_id' => 'Pizza ID',
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
