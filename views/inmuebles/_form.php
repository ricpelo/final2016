<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'habitaciones')->textInput() ?>

    <?= $form->field($model, 'banos')->textInput() ?>

    <?= $form->field($model, 'lavavajillas')->checkbox() ?>

    <?= $form->field($model, 'garaje')->checkbox() ?>

    <?= $form->field($model, 'trastero')->checkbox() ?>

    <?= $form->field($model, 'propietario_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
