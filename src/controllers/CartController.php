<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 08.05.2019
 * Time: 16:48
 */

namespace app\controllers;


use app\models\CartUserForm;
use app\models\Order;
use app\models\Orderitems;
use app\models\SignupForm;
use app\models\Size;
use app\models\User;
use yii\web\Controller;
use app\models\Pizza;
use app\models\Cart;
use app\models\Sizelink;
use app\models\Doughlink;

class CartController extends Controller
{
    public function actionIndex(){

        $session = \Yii::$app->session;
        $session->open();
        if(!\Yii::$app->user->isGuest){
            $model = new CartUserForm();
            if($model->load(\Yii::$app->request->post()) && $model->validate()){

                if($_SESSION['cart.qty']>0){

                    $order = new Order();
                    $order->user_id = \Yii::$app->user->identity['id'];
                    $order->time = date("Y-m-d H:i:s");
                    $order->adr = $model->adr;
                    $order->phone = $model->phone;
                    $order->status = 'Не готов';
                    $order->price = $_SESSION['cart.sum'];


                    $order->save();

                    foreach ($_SESSION['cart'] as $item) {

                        $orderitem = new Orderitems();
                        $orderitem->order_id = $order->id;
                        $orderitem->pizza_id = $item['id_original'];
                        $orderitem->quantity = $item['qty'];


                        if($item['modify']){

                            $orderitem->dough = $item['modify']['dough'];
                            $orderitem->size = $item['modify']['size'];
                        }
                        $orderitem->save();
                    }

                    $cart = new Cart();
                    $cart->clearCart();
                    $_SESSION['cart.order.num'] = $order->id;
                    $_SESSION['cart.order.sum'] = $order->price;
                    $_SESSION['cart.order.adr'] = $order->adr;
                    return $this->goBack('/cart/success');
                }

            }

            return $this->render('index', compact('session', 'model'));
        }
        else {

            $model = new CartUserForm();
            $model2 = new SignupForm();

            if($model->load(\Yii::$app->request->post()) && $model->validate()){

                if($_SESSION['cart.qty']>0){

                    $order = new Order();
                    $user = new User();
                    $user = $user::findByUsername('anonim');
                    $order->user_id = $user->getId();
                    $order->time = date("Y-m-d H:i:s");
                    $order->adr = $model->adr;
                    $order->phone = $model->phone;
                    $order->status = 'Не готов';
                    $order->price = $_SESSION['cart.sum'];
                    $order->save();

                    foreach ($_SESSION['cart'] as $item) {

                        $orderitem = new Orderitems();
                        $orderitem->order_id = $order->id;
                        $orderitem->pizza_id = $item['id_original'];
                        $orderitem->quantity = $item['qty'];


                        if($item['modify']){

                            $orderitem->dough = $item['modify']['dough'];
                            $orderitem->size = $item['modify']['size'];
                        }
                        $orderitem->save();

                    }

                    $cart = new Cart();
                    $cart->clearCart();
                    $_SESSION['cart.order.num'] = $order->id;
                    $_SESSION['cart.order.sum'] = $order->price;
                    $_SESSION['cart.order.adr'] = $order->adr;
                    return $this->goBack('/cart/success');
                }

            }
            if($model2->load(\Yii::$app->request->post()) && $model2->validate()){
                if($_SESSION['cart.qty']>0) {

                    $user = new User();
                    $user->login = $model2->login;
                    $user->email = $model2->email;
                    $user->phone = $model2->phone;
                    $user->adr = $model2->adr;
                    $user->password = \Yii::$app->security->generatePasswordHash($model2->password);


                    if ($user->save()) {


                        $order = new Order();
                        $order->user_id = $user->id;
                        $order->time = date("Y-m-d H:i:s");
                        $order->adr = $model2->adr;
                        $order->phone = $model2->phone;
                        $order->status = 'Не готов';
                        $order->price = $_SESSION['cart.sum'];
                        $order->save();


                        foreach ($_SESSION['cart'] as $item) {

                            $orderitem = new Orderitems();
                            $orderitem->order_id = $order->id;
                            $orderitem->pizza_id = $item['id_original'];
                            $orderitem->quantity = $item['qty'];


                            if ($item['modify']) {

                                $orderitem->dough = $item['modify']['dough'];
                                $orderitem->size = $item['modify']['size'];
                            }
                            $orderitem->save();

                        }

                        $cart = new Cart();
                        $cart->clearCart();
                        $_SESSION['cart.order.num'] = $order->id;
                        $_SESSION['cart.order.sum'] = $order->price;
                        $_SESSION['cart.order.adr'] = $order->adr;
                        return $this->goBack('/cart/success');
                    }
                }
                return $this->goBack();
            }

            return $this->render('index', compact('session', 'model', 'model2'));
        }
        exit;
    }
    public function actionAdd(){

        $id = \Yii::$app->request->get('id');
        $modify = \Yii::$app->request->get('modify');

        if(empty($modify)) $modify = null;
        if(is_numeric($id))
        {
            $item = Pizza::findOne($id);
            if(empty($item)) return false;

            if($modify) {
                $item_d = Doughlink::findOne(['pizza_id' => $id, 'dough' => $modify['dough']]);
                if (empty($item_d)) return false;
                $item_d = Sizelink::findOne(['pizza_id' => $id, 'size' => $modify['size']]);
                if (empty($item_d)) return false;
            }

            $session = \Yii::$app->session;
            $session->open();

            $cart = new Cart();
            $cart->addToCart($item, 1, $modify);

            $this->layout = false;
            return json_encode([
                'sum' => $session['cart.sum'],
                'qty' => $session['cart.qty'],
                'html' => $this->render('cart-modal', compact('session')),
            ]);
        }
        else return false;
    }

    public function actionClear()
    {
        $cart = new Cart();
        $cart->clearCart();
        exit;
    }

    public function actionGetall(){
        $session = \Yii::$app->session;
        $session->open();
        if(!isset($session['cart.qty'])) $session['cart.qty'] = 0;
        if(!isset($session['cart.sum'])) $session['cart.sum'] = 0;
        $this->layout = false;
        return json_encode([
            'sum' => $session['cart.sum'],
            'qty' => $session['cart.qty'],
            'html' => $this->render('cart-modal', compact('session')),
        ]);
    }

    //http://yii2:81/cart/changeqty?id=1.%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D0%BE%D0%B5.35&qty=1
    public function actionChangeqty(){
        $cart = new Cart();
        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');

        $ID_ = $id;

        $modify = null;

        if(!is_numeric($id)) {
            $id = explode('.', $id);
            $modify = [
                'size' => $id[1],
                'dough' => $id[2],
                ];
            $id = $id[0];
        }
        $item = Pizza::findOne($id);
        if(empty($item)) return false;

        $cart->changeQty($item, $qty, $modify);

        return json_encode([
            'thisQty' => $_SESSION['cart'][$ID_]['price'],
            'sum' => $_SESSION['cart.sum'],
            'qty' => $_SESSION['cart.qty'],
        ]);

        exit;
    }

    public function actionRemove(){
        $id = \Yii::$app->request->get('id');

        $ID_ = $id;
        $modify = null;

        if(!is_numeric($id)) {
            $id = explode('.', $id);
            $modify = [
                'dough' => $id[1],
                'size' => $id[2],
            ];
            $id = $id[0];
        }
        $item = Pizza::findOne($id);
        if(empty($item)) return false;

        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->removeFromCart($item, $modify);

        $this->layout = false;
        return json_encode([
            'sum' => $_SESSION['cart.sum'],
            'qty' => $_SESSION['cart.qty'],
        ]);
    }

    public function actionSuccess(){
        $id = $_SESSION['cart.order.num'];
        $adr = $_SESSION['cart.order.adr'];
        $price = $_SESSION['cart.order.sum'];
        return $this->render('success', compact('id', 'adr', 'price'));
    }
}