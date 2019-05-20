<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 10.05.2019
 * Time: 21:51
 */

namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $password;
    public $email;
    public $phone;
    public $adr;

    public function rules() {
        return [
            [
                ['login', 'password', 'email', 'phone'],
                'required',
                'message' => 'Заполните поле'
            ],
            [
                'login',
                'unique',
                'targetClass' => User::className(),
                'message' => 'Этот логин уже занят'
            ],
            [
                'password',
                'string',
                'length' => [8, 24],
                'message' => 'Длина пароля от 8 символов'
            ],
            [
                'adr',
                'string'
            ],
            [
                'email',
                'email',
                'message' => 'Заполните email корректно'
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'email',
            'phone' => 'Телефон',
            'adr' => 'Адрес',
        ];
    }

}