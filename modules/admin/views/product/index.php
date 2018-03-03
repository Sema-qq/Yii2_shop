<?php

use app\models\Brand;
use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'price',
            [
                'attribute' => 'category_id',
                'value' => function($model){
                    return $model->category->name;
                },
                'filter' => ArrayHelper::map(Category::find()->all(), 'id','name')
            ],
            [
                'attribute' => 'brand_id',
                'value' => function($model){
                    return $model->brand->name;
                },
                'filter' => ArrayHelper::map(Brand::find()->all(), 'id','name')
            ],
            // 'description:ntext',
             [
                 'attribute' => 'avialability',
                 'value' => function($model){
                     return $model->status ? 'Есть в наличии' : 'Отсутствует на складе';
                 },
                 'filter' => [
                     Product::IS_NOT_AVIALABLE => 'Отсутствует на складе',
                     Product::IS_AVIALABLE => 'Есть в наличии'
                 ]
             ],
             [
                 'attribute' => 'is_new',
                 'value' => function($model){
                     return $model->is_new ? 'Да' : 'Нет';
                 },
                 'filter' => [
                     Product::IS_NOT_NEW => 'Нет',
                     Product::IS_NEW => 'Да'
                 ]
             ],
             [
                 'attribute' => 'is_recommended',
                 'value' => function($model){
                     return $model->is_recommended ? 'Да' : 'Нет';
                 },
                 'filter' => [
                     Product::IS_NOT_RECOMMENDED => 'Нет',
                     Product::IS_RECOMMENDED => 'Да'
                 ]
             ],
             [
                 'attribute' => 'status',
                 'value' => function($model){
                     return $model->status ? 'Опубликован' : 'Не опубликован';
                 },
                 'filter' => [
                     Product::STATUS_NOT_PUBLISHED => 'Не опубликован',
                     Product::STATUS_PUBLISHED => 'Опубликован'
                 ]
             ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($model){
                    return Html::img($model->getImage(), ['width' => 100]);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
