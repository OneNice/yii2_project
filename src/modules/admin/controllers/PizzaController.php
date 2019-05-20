<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use app\modules\admin\models\Dough;
use app\modules\admin\models\Doughlink;
use app\modules\admin\models\Ingredient;
use app\modules\admin\models\Pizzalink;
use app\modules\admin\models\Size;
use app\modules\admin\models\Sizelink;
use app\modules\admin\models\Type;
use Yii;
use app\modules\admin\models\Pizza;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PizzaController implements the CRUD actions for Pizza model.
 */
class PizzaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pizza models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pizza::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pizza model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pizza model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pizza();

        $model->category_id = ArrayHelper::map(Category::find()->all(),'id', 'name');
        $model->type_id = ArrayHelper::map(Type::find()->all(),'id', 'name');


        $sizes = Size::find()->all();
        $doughs = Dough::find()->all();

        $ingredients = Ingredient::find()->all();

        if ($model->load(Yii::$app->request->post())){
            $model->image = $this->uploadFile('Pizza', 'image');

        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $sizearray = \Yii::$app->request->post('size');
            if($sizearray) foreach ($sizearray as $size) {
                $buf = new Sizelink();
                $buf->pizza_id = $model->id;
                $buf->size = $size;
                $buf->save();
            }
            $dougharray = \Yii::$app->request->post('dough');
            if($dougharray) foreach ($dougharray as $dough) {
                $buf = new Doughlink();
                $buf->pizza_id = $model->id;
                $buf->dough = $dough;
                $buf->save();
            }
            $ingrarray = \Yii::$app->request->post('ingr');
            if($ingrarray) foreach ($ingrarray as $ingr) {
                $buf = new Pizzalink();
                $buf->pizza_id = $model->id;
                $buf->ingredient_id = $ingr;
                $buf->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', compact('model', 'sizes', 'doughs', 'ingredients'));
    }

    /**
     * Updates an existing Pizza model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sizes = Size::find()->asArray()->all();
        $sizes_sel =  ArrayHelper::getColumn(Sizelink::find()->where(['pizza_id' => $model->id])->all(),'size');    //данные, которые связаны с товаром

        $doughs = Dough::find()->asArray()->all();
        $doughs_sel = ArrayHelper::getColumn(Doughlink::find()->where(['pizza_id' => $model->id])->all(),'dough');

        $ingredients = Ingredient::find()->asArray()->all();
        $ingredients_sel = ArrayHelper::getColumn(Pizzalink::find()->where(['pizza_id' => $model->id])->all(), 'ingredient_id');
        //debug($ingredients_sel);


        if ($model->load(Yii::$app->request->post())){
            $model->image = $this->uploadFile('Pizza', 'image');

        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Doughlink::deleteAll(['pizza_id' => $model->id]);
            Sizelink::deleteAll(['pizza_id' => $model->id]);
            Pizzalink::deleteAll(['pizza_id' => $model->id]);

            $sizearray = \Yii::$app->request->post('size');     //Сохраняем выбранные значения
            if($sizearray) foreach ($sizearray as $size) {
                $buf = new Sizelink();
                $buf->pizza_id = $model->id;
                $buf->size = $size;
                $buf->save();
            }
            $dougharray = \Yii::$app->request->post('dough');
            if($dougharray) foreach ($dougharray as $dough) {
                $buf = new Doughlink();
                $buf->pizza_id = $model->id;
                $buf->dough = $dough;
                $buf->save();
            }
            $ingrarray = \Yii::$app->request->post('ingr');
            if($ingrarray) foreach ($ingrarray as $ingr) {
                $buf = new Pizzalink();
                $buf->pizza_id = $model->id;
                $buf->ingredient_id = $ingr;
                $buf->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model', 'sizes', 'doughs', 'ingredients', 'sizes_sel', 'doughs_sel', 'ingredients_sel'));
    }

    /**
     * Deletes an existing Pizza model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pizza model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pizza the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pizza::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    private function getUnusedRandomFileName($ext) {
        do {
            $name = uniqid('Upload_', true) . '.' . $ext;
        } while (file_exists('web/img/upload/' . $name));
        return $name;
    }

    private function uploadFile($input = 'Pizza', $input2 = 'image'){
        $uploaddir = \Yii::getAlias('@webroot') . '/img/upload/';
        $tmp = $_FILES[$input]['tmp_name'][$input2];

        $imageFileType = strtolower(pathinfo($uploaddir . basename($_FILES[$input]['name'][$input2]),PATHINFO_EXTENSION));

        $_FILES[$input]['name'][$input2] = $this->getUnusedRandomFileName($imageFileType);
        $uploadfile = $uploaddir . $_FILES[$input]['name'][$input2];


        if ($_FILES[$input]['size'][$input2] > 5300000) {
            $_SESSION['errors'] = "Файл слишком большой :c мы на такое не готовы";
            $this->goHome();
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['errors'] = "Только картинки разрешены к загрузке";
            $this->goHome();
        }

        if (move_uploaded_file( $tmp , $uploadfile)) {
            return $_FILES[$input]['name'][$input2];
        } else {
            $_SESSION['errors'] = "Возможная атака с помощью файловой загрузки!";
            $this->goHome();
        }

    }
}
