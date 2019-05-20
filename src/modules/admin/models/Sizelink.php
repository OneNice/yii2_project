<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sizelink".
 *
 * @property int $id
 * @property int $pizza_id
 * @property int $size
 *
 * @property Pizza $pizza
 */
class Sizelink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizelink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'size'], 'required'],
            [['pizza_id', 'size'], 'integer'],
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
            'pizza_id' => 'Pizza ID',
            'size' => 'Size',
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
