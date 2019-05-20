<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


if(!empty($session['cart'])){ ?>
    <style>
        body{
            background: #fff;
        }
    </style>
    <div class="my_cart_no">
    <div>
        <?php foreach ($session['cart'] as $item) { ?>
            <div class="cart_item" dataid="<?= $item['id'] ?>" >
                <div class="cart_image"><?= \yii\helpers\Html::img("@web/img/upload/".$item['image'], []) ?></div>
                <div class="grid">
                    <div class="head"><?= $item['name'] ?></div>
                    <div class="modify" datadouht="<?= $item['modify']['dough'] ?>" datasize="<?= $item['modify']['size'] ?>"><?= $item['modify']['dough'] . ' ' . $item['modify']['size'] ?></div>
                </div>
                <div class="input-number">
                    <button dataid="<?= $item['id'] ?>" type="button">−</button><span><?= $item['qty'] ?></span><button dataid="<?= $item['id'] ?>" type="button" data="+">+</button>
                </div>
                <div class="cart_price"><span><?= $item['price'] ?></span> руб.</div>
                <div class="removeItem" dataid="<?= $item['id'] ?>">x</div>
            </div>
        <?php } ?>

    </div>
<?php if(Yii::$app->user->isGuest) { ?>

    <h3 class="oneClick">
        <input type="checkbox" checked="" data-plugin="switchery" data-color="#F90053" data-switchery="true">
        <span>Без регистрации</span>
    </h3>
    <?= Html::button('Оформить', ['class' => 'goOrd2']) ?>

    <div class="or" style="display:none;">
        <div class="block form_one">
            <div data="form_one">
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}{input}\n{hint}\n{error}",
                ],
                'errorCssClass' => 'errosr'
            ]) ?>
            <?= $form->field($model, 'phone')->input('text', ['placeholder' => "Телефон"]) ?>
            <?= $form->field($model, 'adr')->input('text', ['placeholder' => "Адрес"]) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Оформить', ['class' => 'goOrd']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
                <code>
                    <span class="avgSum">Итоговая сумма: <span><?= $session['cart.sum'] ?></span> руб.</span>
                </code>
            </div>
        </div>
        <div class="block form_register">

            <div data="form_register">
            <?php $form2 = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}{input}\n{hint}\n{error}",
                ],
                'errorCssClass' => 'errosr'
            ]) ?>
            <?= $form->field($model2, 'login')->input('text', ['placeholder' => "Логин"]) ?>
            <?= $form->field($model2, 'password')->passwordInput(['placeholder' => "Пароль"]) ?>
            <?= $form->field($model2, 'email')->input('text', ['placeholder' => "Email"]) ?>
            <?= $form->field($model2, 'phone')->input('text', ['placeholder' => "Телефон"]) ?>
            <?= $form->field($model2, 'adr')->input('text', ['placeholder' => "Адрес"]) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Регистрация', ['class' => 'goOrd']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
                <code>
                    <span class="avgSum">Итоговая сумма: <span><?= $session['cart.sum'] ?></span> руб.</span>
                </code>
            </div>

        </div>
    </div>
<?php } else {?>


    <?= Html::button('Оформить', ['class' => 'goOrd2', 'data' => 'form_user']) ?>

    <div class="block form_user" style="display:none;">

        <div data="form_user">
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}{input}\n{hint}\n{error}",
                ],
                'errorCssClass' => 'errosr'
            ]) ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'adr') ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Оформить', ['class' => 'goOrd']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
            <code>
                <span class="avgSum">Итоговая сумма: <span><?= $session['cart.sum'] ?></span> руб.</span>
            </code>
        </div>
    </div>


<?php  } ?>
    </div>
    <script>
        $('.input-number button').on('click', function (e) {
            e.preventDefault();
            var val = Number($(this).parent().find('span').html());
            var id = $(this).attr('dataid');
            if($(this).attr('data')=='+') {
                $(this).parent().find('span').html(val+1);
                $.ajax({
                    url: '/cart/changeqty',
                    data: {
                        id: id,
                        qty: Number($(this).parent().find('span').html())
                    },
                    type: 'GET',
                    success: function (res) {
                        if(!res) console.log('ошибка');
                        else {
                            $('.cart_bottom span, .avgQty span').html(
                                JSON.parse(res).qty
                            );
                            $('.cart_top span, .avgSum span').html(
                                JSON.parse(res).sum
                            );
                            $(".cart_item[dataid='"+id+"'] .cart_price span").html(
                                JSON.parse(res).thisQty
                            );
                        }
                    },
                    error: function (res) {
                        console.log('Ошибка связи');
                        console.log(res);
                    }
                });
            }
            else {
                if(val-1>0) {
                    $(this).parent().find('span').html(val - 1);
                    $.ajax({
                        url: '/cart/changeqty',
                        data: {
                            id: id,
                            qty: Number($(this).parent().find('span').html()),
                        },
                        type: 'GET',
                        success: function (res) {
                            if(!res) console.log('ошибка');
                            else {
                                $('.cart_bottom span, .avgQty span').html(
                                    JSON.parse(res).qty
                                );
                                $('.cart_top span, .avgSum span').html(
                                    JSON.parse(res).sum
                                );
                                $(".cart_item[dataid='"+id+"'] .cart_price span").html(
                                    JSON.parse(res).thisQty
                                );
                            }
                        },
                        error: function (res) {
                            console.log('Ошибка связи');
                            console.log(res);
                        }
                    });
                }
            }
        });
        $('.removeItem').on('click', function () {
            var id = $(this).attr('dataid');
            $(this).parent().remove();
            $.ajax({
                url: '/cart/remove',
                data: {
                    id: id,
                },
                type: 'GET',
                success: function (res) {
                    if(!res) console.log('ошибка');
                    else {
                        $('.cart_bottom span, .avgQty span').html(
                            JSON.parse(res).qty
                        );
                        $('.cart_top span, .avgSum span').html(
                            JSON.parse(res).sum
                        );
                    }
                },
                error: function (res) {
                    console.log('Ошибка связи');
                    console.log(res);
                }
            });
        });
    </script>
<?php } else { ?>

    <h3>Корзина пуста :C</h3>

<?php }
