<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int $parent
 * @property int $sort
 *
 * @property Pizza[] $pizzas
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent'], 'required'],
            [['parent', 'sort'], 'integer'],
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
            'name' => 'Name',
            'parent' => 'Parent',
            'sort' => 'Sort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPizzas()
    {
        return $this->hasMany(Pizza::className(), ['category_id' => 'id']);
    }
}
