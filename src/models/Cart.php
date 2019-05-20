<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 08.05.2019
 * Time: 16:52
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    //http://yii2:81/cart/add?id=1&modify[size]=35&modify[dough]=%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D0%BE%D0%B5
    public function addToCart($item, $qty = 1, $modify = null){

        $price = $item->price;
        if($modify) {
            $ID = $item->id . '.' . implode('.', $modify);
            $price = $item->price * (float)(Size::findOne(['size' => $modify['size']])->k) * (float)(Dough::findOne(['dough' => $modify['dough']])->k);
        }
        else $ID = $item->id;

        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
            $_SESSION['cart'][$ID]['price'] += $qty * $price;
        }
        else{
            $_SESSION['cart'][$ID] = [
                'id' => $ID,
                'id_original' => $item->id,
                'qty' => $qty,
                'name' => $item->name,
                'price' => $price,
                'image' => $item->image,
                'modify' => $modify != null ? $modify : null,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($price * $qty) : ($item->price * $qty);

    }

    public function clearCart(){
        unset($_SESSION['cart']);
        $_SESSION['cart.sum'] = 0;
        $_SESSION['cart.qty'] = 0;
    }

    public function changeQty($item, $qty, $modify){
        $price = $item->price;
        if($modify) {
            $ID = $item->id . '.' . implode('.', $modify);
            $price = $item->price * (float)(Size::findOne(['size' => $modify['size']])->k) * (float)(Dough::findOne(['dough' => $modify['dough']])->k);

        }
        else $ID = $item->id;

        if(is_numeric($qty)){
            if($qty> 0){

                if(isset($_SESSION['cart'][$ID])){
                    $_SESSION['cart'][$ID]['qty'] = $qty;
                    $_SESSION['cart'][$ID]['price'] = $qty * $price;

                    $this->reload();
                }
            }
        }
        return false;
    }

    public function reload(){
        $_SESSION['cart.sum'] = 0;
        $_SESSION['cart.qty'] = 0;

        foreach ($_SESSION['cart'] as $item)
        {
            $_SESSION['cart.qty'] += $item['qty'];
            $_SESSION['cart.sum'] += $item['price'];
        }
        if($_SESSION['cart.qty']==0) $this->clearCart();
    }

    public function removeFromCart($item, $modify = null){

        if($modify) $ID = $item->id . '.' . implode('.',$modify);
        else $ID = $item->id;

        unset($_SESSION['cart'][$ID]);

        $this->reload();

    }
}