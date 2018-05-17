<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InmueblesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
$js = <<<EOT
    $('.interesado').click(function(event) {
        tlf = $(this).parents('tr').find('.telefono'); // .first();
        tlf.show();
    });
EOT;
$this->registerJs($js);
?>
<div class="inmuebles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inmuebles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'precio',
            'habitaciones',
            'banos',
            'lavavajillas:boolean',
            'garaje:boolean',
            'trastero:boolean',
            [
                'attribute' => 'propietario.telefono',
                'content' => function ($model, $key, $index, $column) {
                    return '<span class="telefono" style="display: none">'
                        . $model->propietario->telefono
                        . '</span>';
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {interesado}',
                'buttons' => [
                    'interesado' => function ($url, $model, $key) {
                        return Html::button('Interesado', [
                            'class' => 'btn-xs btn-success interesado',
                            // 'data' => [
                            //     'telefono' => $model->propietario->telefono,
                            // ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
