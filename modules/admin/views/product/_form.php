<?php

use app\models\Product;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'avialability')->dropDownList([
        Product::IS_AVIALABLE => 'Да',
        Product::IS_NOT_AVIALABLE => 'Нет',
    ]) ?>

    <?= $form->field($model, 'is_new')->dropDownList([
        Product::IS_NEW => 'Да',
        Product::IS_NOT_NEW => 'Нет'
    ]) ?>

    <?= $form->field($model, 'is_recommended')->dropDownList([
        Product::IS_RECOMMENDED => 'Да',
        Product::IS_NOT_RECOMMENDED => 'Нет'
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        Product::STATUS_PUBLISHED => 'Да',
        Product::STATUS_NOT_PUBLISHED => 'Нет'
    ])->label('Опубликовать?') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
