<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 07.05.2019
 * Time: 17:08
 */

namespace app\widgets;


use app\models\Category;
use yii\base\Widget;

class Categories extends Widget
{
    public function run(){
        $cache_types = \Yii::$app->cache->get('cats');
        if($cache_types) return $cache_types;
        $data = Category::find()->orderBy('sort')->asArray()->all();
        \Yii::$app->cache->set('cats', $this->getHTML($data), 60*24);
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
        include __DIR__ . '/Categories/list.php';
        return ob_get_clean();
    }
}