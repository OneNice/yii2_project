<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderitems".
 *
 * @property int $id
 * @property int $pizza_id
 * @property string $dough
 * @property string $size
 * @property int $quantity
 * @property int $order_id
 *
 * @property Pizza $pizza
 * @property Order $order
 */
class Orderitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'quantity', 'order_id'], 'required'],
            [['pizza_id', 'quantity', 'order_id'], 'integer'],
            [['dough', 'size'], 'string', 'max' => 50],
            [['pizza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pizza::className(), 'targetAttribute' => ['pizza_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pizza_id' => 'Пицца',
            'dough' => 'Тесто',
            'size' => 'Размер',
            'quantity' => 'Количество',
            'order_id' => 'Order ID',
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
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
