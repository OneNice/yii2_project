<?php
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
    <div class="tops">
        <?php
            foreach ($tops as $top) { ?>
                <div class="item"
                     style="background: url('img/upload/<?= $top->image ?>'); background-size: cover;">
                    <a class="gogo" data="<?= $top->pizza->id ?>"></a>
                </div>
            <?php } ?>
    </div>
    <div class="beforeList flex">
        <h3 class="category" data="<?= \app\models\Category::findOne(['name'=>'Пицца'])->id ?>">Пицца с доставкой</h3>
        <div class="onRight">
            <ul class="types"><?= \app\widgets\Types::widget() ?></ul>
        </div>
    </div>
    <div class="main">
        <?php foreach($categories as $category){ ?>
        <?php if($category['name'] != 'Пицца') { ?> <h3 class="category" data="<?= $category['id'] ?>"><?= $category['name'] ?></h3><?php } ?>
        <div class="list flex flex-wrap <?php if($category['name'] == 'Пицца') echo  "pizza_container" ?>">
                <?php foreach ($items->where(['category_id'=>$category['id']])->all() as $item) {?>
                <article
                        class="type-<?= $item->type_id ?> type-1 <?php if($item->additional == 1) echo 'article_additional'?>"
                        data="<?= $item->id ?>"
                        dataType="<?= $item->type_id ?>"
                >
                    <?php if($item->new == 1) { ?>
                    <div class="ribbon-two ribbon-two-danger price">
                        <span>Новинка</span>
                    </div>
                    <?php } ?>
                    <?= Html::img("@web/img/upload/{$item->image}") ?>
                    <div class="about">
                        <h3><?= $item->name ?> <i><?= $item->weight ?>г</i></h3>
                        <?php if($item->composition == 1) { ?>
                        <div class="composition">
                            <?php $ingrs = $item->getPizzalinks()->all();
                            foreach ($ingrs as $index => $ingr) {
                                if($ingr->change == 'true') { ?>
                                    <span class="canChange"><?= $ingr->ingredient->name ?><?php if(count($ingrs)-1 != $index) echo ','?></span>
                                <?php } else { ?>
                                    <span><?= $ingr->ingredient->name ?><?php if(count($ingrs)-1 != $index) echo ','?></span>
                            <?php } } ?>
                        </div>
                        <?php } ?>
                        <div class="additional">
                            <?php if($item->additional == 1) { ?>
                            <div class="flex">
                            <div class="styled-select select_size">
                                <select class="sel_size">
                                    <?php foreach ($item->getSizelinks()->all() as $size) { ?>
                                        <option value="<?= $size->size ?>" datak="<?= $size->size0->k ?>"><?= $size->size ?> см.</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="styled-select select_dough">
                                <select class="sel_dough">
                                    <?php foreach ($item->getDoughlinks()->all() as $d) { ?>
                                        <option value="<?= $d->dough ?>" datak="<?= $d->dough0->k ?>"><?= $d->dough ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            </div>
                            <?php } ?>
                            <div class="item_info flex">
                                <span class="price"><?= $item->price ?> руб.</span>
                                <button data="<?= $item['id'] ?>" dataprice="<?= $item['price'] ?>" datapriceorig="<?= $item['price'] ?>">В корзину</button>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>
           </div>
        <?php } ?>
    </div>