<div class="row">
    <div class="col-xl-4">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Информация об аккаунте</h4>
            <div class="panel-body">

                <hr/>

                <div class="text-left">
                    <p class="text-muted font-13"><strong>Логин:</strong> <span class="m-l-15"><?= Yii::$app->user->identity['login'] ?></span></p>

                    <p class="text-muted font-13"><strong>Телефон:</strong><span class="m-l-15"><?= Yii::$app->user->identity['phone'] ?></span></p>

                    <p class="text-muted font-13"><strong>Email:</strong> <span class="m-l-15"><?= Yii::$app->user->identity['email'] ?></span></p>

                    <p class="text-muted font-13"><strong>Адрес:</strong> <span class="m-l-15"><?= Yii::$app->user->identity['adr'] ?></span></p>


                </div>
                <div >
                        <a href="/lk/settings" type="button" class="btn btn-light waves-effect">
                            <i class="mdi mdi-account-settings-variant mr-1"></i> Редактировать профиль
                        </a>
                </div>
            </div>
        </div>
        <!-- Personal-Information -->

        <div class="card-box ribbon-box">
            <div class="ribbon ribbon-primary">Сообщения от лучшей пиццерии</div>
            <div class="clearfix"></div>
            <div class="inbox-widget">
                <?php
                if(count($messages)==0) echo '<h4 class="header-title mt-0 m-b-20">Новых сообщений нету</h4>';
                else foreach ($messages as $item) { ?>
                <a>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="/img/upload/avatar.png" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Новый статус</p>
                        <p class="inbox-item-text"><?= $item->message ?></p>
                        <p class="inbox-item-date m-t-10">
                            <button data="<?= $item->id ?>" type="button" class="remove_mess btn btn-icon btn-sm waves-effect waves-light btn-success"> Удалить </button>
                        </p>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>

    </div>


    <div class="col-xl-8">

        <div class="row">

            <div class="col-sm-4">
                <div class="card-box tilebox-one">
                    <i class="icon-layers float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Заказы</h6>
                    <h2 class="m-b-20" data-plugin="counterup"><?= $array['order_count'] ?></h2>
                </div>
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card-box tilebox-one">
                    <i class="icon-paypal float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Сумма всех заказов</h6>
                    <h2 class="m-b-20"><span data-plugin="counterup"><?= $array['order_sum'] ?></span> руб.</h2>
                </div>
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card-box tilebox-one">
                    <i class="icon-layers float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Заказы на этой неделе</h6>
                    <h2 class="m-b-20" data-plugin="counterup"><?= $array['order_count'] ?></h2>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->



        <div class="card-box">
            <h4 class="header-title mb-3">Последние заказы</h4>
            <div class="table-responsive">
                <table class="table m-b-0">
                    <thead>
                    <tr>
                        <th>Заказ</th>
                        <th>Дата</th>
                        <th>Сумма</th>
                        <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($last_array as $item) { ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['time'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['status'] ?></td>
                    </tr>
                    <?php  } ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Новости пиццерии</h4>
            <div class="">
                <?php foreach ($lastnews as $lastnew) { ?>

                <div class="">
                    <h5 class="text-custom m-b-5"><?= $lastnew->head ?> </h5>
                    <p class="text-muted font-13 m-b-0"><?= $lastnew->content ?></p>
                    <p><b><?= $lastnew->date ?></b></p>
                </div>

                <?php } ?>

            </div>
        </div>

    </div>
    <!-- end col -->

</div>
<!-- end row -->