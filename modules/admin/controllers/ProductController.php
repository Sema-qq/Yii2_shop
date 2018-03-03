<?php

namespace app\modules\admin\controllers;

use app\models\Brand;
use app\models\Category;
use app\models\ImageUpload;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload();
        //если форма была отправлена
        if(Yii::$app->request->isPost){
            //вытащим статью по id
            $product = $this->findModel($id);
            //получим объект с картинкой, который почему то в массиве..
            $file = UploadedFile::getInstances($model, 'image');
            //параметр сохраняет картинку на сервер и возвращает имя
            //saveImage сохраняет картинку в базу
            if ($product->saveImage($model->uploadFile($file[0], $product->image))){
                //если всё успешно сохранилось, то направимся на страницу статьи
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        //иначе опять покажем форму
        return $this->render('image', compact('model'));
    }

    /**
     * Выбор категории
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionSetCategory($id)
    {
        //вытащим статью по id
        $product = $this->findModel($id);
        //получим текущее id категории в статье
        $selectedCategory = $product->category->id;
        //список названий всех категорий для дропдаунлиста во вьюхе
        $categories = ArrayHelper::map(Category::find()->all(), 'id','name');
        //если форма отправлена, то
        if (Yii::$app->request->isPost){
            //получим значение выбранной категории
            $category = Yii::$app->request->post('category');
            //и сохраним его
            if ($product->saveCategory($category)){
                //если сохранение прошло успешно, то редирект во вьюху статьи
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        //иначе опять покажем форму
        return $this->render('category', compact('product','selectedCategory', 'categories'));
    }

    /**
     * Выбор производителя
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionSetBrand($id)
    {
        //вытащим статью по id
        $product = $this->findModel($id);
        //получим текущее id категории в статье
        $selectedBrand = $product->brand->id;
        //список названий всех категорий для дропдаунлиста во вьюхе
        $brands = ArrayHelper::map(Brand::find()->all(), 'id','name');
        //если форма отправлена, то
        if (Yii::$app->request->isPost){
            //получим значение выбранной категории
            $brand = Yii::$app->request->post('brand');
            //и сохраним его
            if ($product->saveBrand($brand)){
                //если сохранение прошло успешно, то редирект во вьюху статьи
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        //иначе опять покажем форму
        return $this->render('brand', compact('product','selectedBrand', 'brands'));
    }
}
