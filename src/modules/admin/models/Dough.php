<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dough".
 *
 * @property string $dough
 * @property string $k
 *
 * @property Doughlink[] $doughlinks
 */
class Dough extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dough';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dough'], 'required'],
            [['dough'], 'string', 'max' => 50],
            [['k'], 'string', 'max' => 10],
            [['dough'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dough' => 'Тесто',
            'k' => 'Коэффициент стоимости',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoughlinks()
    {
        return $this->hasMany(Doughlink::className(), ['dough' => 'dough']);
    }
}
