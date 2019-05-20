<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "pizza".
 *
 * @property int $id
 * @property string $name
 * @property int $type_id
 * @property int $category_id
 * @property int $weight
 * @property int $price
 * @property string $image
 * @property string $composition
 * @property string $additional
 * @property string $new
 * @property string $sale
 *
 * @property Doughlink[] $doughlinks
 * @property Orderitems[] $orderitems
 * @property Type $type
 * @property Category $category
 * @property Pizzalink[] $pizzalinks
 * @property Sizelink[] $sizelinks
 * @property Tops[] $tops
 */
class Pizza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizza';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_id', 'category_id', 'weight', 'price'], 'required'],
            [['type_id', 'category_id', 'weight', 'price'], 'integer'],
            [['composition', 'additional', 'new', 'sale'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'type_id' => 'Тип',
            'category_id' => 'Категория',
            'weight' => 'Вес',
            'price' => 'Цена',
            'image' => 'IMG',
            'composition' => 'Состав',
            'additional' => 'Доп.',
            'new' => 'NEW',
            'sale' => 'Скидка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoughlinks()
    {
        return $this->hasMany(Doughlink::className(), ['pizza_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitems::className(), ['pizza_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPizzalinks()
    {
        return $this->hasMany(Pizzalink::className(), ['pizza_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizelinks()
    {
        return $this->hasMany(Sizelink::className(), ['pizza_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTops()
    {
        return $this->hasMany(Tops::className(), ['pizza_id' => 'id']);
    }
}
