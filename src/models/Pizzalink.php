<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pizzalink".
 *
 * @property int $id
 * @property int $pizza_id
 * @property int $ingredient_id
 * @property string $change
 *
 * @property Pizza $pizza
 * @property Ingredient $ingredient
 */
class Pizzalink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizzalink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'ingredient_id'], 'required'],
            [['pizza_id', 'ingredient_id'], 'integer'],
            [['change'], 'string'],
            [['pizza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::className(), 'targetAttribute' => ['pizza_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['ingredient_id' => 'id']],
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
            'ingredient_id' => 'Ingredient ID',
            'change' => 'Change',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPizza()
    {
        return $this->hasOne(Pizza::className(), ['id' => 'pizza_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::className(), ['id' => 'ingredient_id']);
    }
}
