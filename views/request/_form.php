<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-form">

    <?php
        $users = \app\models\User::find()->all();
        $items = \yii\helpers\ArrayHelper::map($users, 'id', function ($model) {
            return $model->getFullName();
        })
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mark_id')->dropDownList(\app\models\CarMark::find()->select('name')->indexBy('id')->column()) ?>

    <?= $form->field($model, 'engine_capacity')->input('number') ?>

    <?= $form->field($model, 'release_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gear_type_id')->dropDownList(\app\models\GearType::find()->select('name')->indexBy('id')->column()) ?>

    <?= $form->field($model, 'user_id')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
