<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use app\models\User;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'signup'],    //Правлила только для login...
                'rules' => [
                    /*[
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],       // ? не авторизир
                    ],*/
                    [
                        'allow' => true,    //разрешаеем всё для авторизованных
                        //'actions' => ['logout'],
                        'roles' => ['@'],       // авторизир
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->login);
                        }
                    ],
                ],
            ],
        ];
    }
}
