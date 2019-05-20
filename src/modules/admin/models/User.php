<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property string $role
 * @property string $name
 * @property string $phone
 * @property string $adr
 *
 * @property Order[] $orders
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'role', 'name', 'phone'], 'required'],
            [['auth_key', 'role', 'adr'], 'string'],
            [['login', 'email', 'name'], 'string', 'max' => 50],
            [['password', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'role' => 'Роль',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'adr' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }
}
