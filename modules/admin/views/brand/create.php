<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = 'Создание производитела';
$this->params['breadcrumbs'][] = ['label' => 'Производители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
