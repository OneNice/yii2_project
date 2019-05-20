<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 07.05.2019
 * Time: 13:57
 */

namespace app\widgets;



use app\models\Type;
use yii\base\Widget;


class Types extends Widget
{
    public function run(){
        $cache_types = \Yii::$app->cache->get('types');
        if($cache_types) return $cache_types;
        $data = Type::find()->indexBy('id')->asArray()->all();
        \Yii::$app->cache->set('types', $this->getHTML($data), 60*24);
        return $this->getHTML($data);
    }

    public function getHTML($data){
        $str = '';
        foreach ($data as $item) {
            $str .= $this->getTPL($item);
        }
        return $str;
    }

    public function getTPL($item){
        ob_start();
        include __DIR__ . '/Types/list.php';
        return ob_get_clean();
    }
}