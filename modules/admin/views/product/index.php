<?php

use app\models\Product;
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'category_id',
            'code',
            'price',
            // 'brand_id',
            // 'image',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
