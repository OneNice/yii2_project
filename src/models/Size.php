<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $size
 * @property string $k
 *
 * @property Sizelink[] $sizelinks
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'required'],
            [['size'], 'integer'],
            [['k'], 'string', 'max' => 10],
            [['size'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'size' => 'Размер',
            'k' => 'K',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizelinks()
    {
        return $this->hasMany(Sizelink::className(), ['size' => 'size']);
    }
}
