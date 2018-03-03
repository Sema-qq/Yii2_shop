<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'category_id',
            'code',
            'price',
            'brand_id',
            'description:ntext',
            [
                'attribute' => 'avialability',
                'value' => $model->avialability ? 'Есть в наличии' : 'Отсутствует на складе'
            ],
            [
                'attribute' => 'is_new',
                'value' => $model->is_new ? 'Да' : 'Нет'
            ],
            [
                'attribute' => 'is_recommended',
                'value' => $model->is_recommended ? 'Да' : 'Нет'
            ],
            [
                'attribute' => 'status',
                'value' => $model->status ? 'Опубликован' : 'Не опубликован'
            ]
        ],
    ]) ?>

</div>
