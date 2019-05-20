<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string $name
 * @property int $weight
 * @property int $price
 *
 * @property Pizzalink[] $pizzalinks
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'weight'], 'required'],
            [['weight', 'price'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'weight' => 'Вес / калорийность',
            'price' => 'Цена, руб.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPizzalinks()
    {
        return $this->hasMany(Pizzalink::className(), ['ingredient_id' => 'id']);
    }
}
