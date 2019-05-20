<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Tops;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TopsController implements the CRUD actions for Tops model.
 */
class TopsController extends Controller
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
     * Lists all Tops models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tops::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tops model.
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
     * Creates a new Tops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tops();

        if ($model->load(Yii::$app->request->post())){
            $model->image = $this->uploadFile('Tops', 'image');

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


            $model->image = $this->uploadFile('Tops', 'image');
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);

        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tops model.
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
     * Finds the Tops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tops::findOne($id)) !== null) {
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
