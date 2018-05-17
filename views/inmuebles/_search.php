<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InmueblesSearch */
/* @var $form yii\widgets\ActiveForm */

$lista = ['' => '', 0 => 'No', 1 => 'Sí'];
?>

<div class="inmuebles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'precioDesde') ?>

    <?= $form->field($model, 'precioHasta') ?>

    <?= $form->field($model, 'habitaciones') ?>

    <?= $form->field($model, 'banos') ?>

    <?= $form->field($model, 'lavavajillas')-> dropDownList($lista) ?>

    <?= $form->field($model, 'garaje')->dropDownList($lista) ?>

    <?= $form->field($model, 'trastero')->dropDownList($lista) ?>

    <?= $form->field($model, 'propietario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
