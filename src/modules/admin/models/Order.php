<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property double $price
 * @property string $time
 * @property string $phone
 * @property string $adr
 * @property string $status
 *
 * @property User $user
 * @property Orderitems[] $orderitems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'time', 'phone', 'adr', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['time'], 'safe'],
            [['phone', 'adr'], 'string'],
            [['status'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Заказ #',
            'user_id' => 'Пользователь',
            'time' => 'Время оформления',
            'price' => 'Цена',
            'phone' => 'Телефон',
            'adr' => 'Адрес',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitems::className(), ['order_id' => 'id']);
    }
}
