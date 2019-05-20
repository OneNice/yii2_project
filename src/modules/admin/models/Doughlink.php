<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "doughlink".
 *
 * @property int $id
 * @property int $pizza_id
 * @property string $dough
 *
 * @property Pizza $pizza
 */
class Doughlink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doughlink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'dough'], 'required'],
            [['pizza_id'], 'integer'],
            [['dough'], 'string', 'max' => 50],
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
            'dough' => 'Dough',
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
