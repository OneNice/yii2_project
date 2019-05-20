<?php
    if(!empty($session['cart'])){ ?>
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
        <h3 class="avgQty">Количество: <span><?= $session['cart.qty'] ?></span></h3>
        <h3 class="avgSum">Итоговая сумма: <span><?= $session['cart.sum'] ?></span> руб.</h3>
        <a class="goOrd2" href="cart">Оформление</a>
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
