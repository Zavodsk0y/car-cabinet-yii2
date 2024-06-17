<?php

use app\models\Request;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'attribute' => 'nameUser',
                'label' => 'Имя',
                'value' => 'user.name'
            ],
            [
                    'attribute' => 'surnameUser',
                'label' => 'Фамилия',
                'value' => 'user.surname'
            ],
            'name',
            [
                'attribute' => 'mark',
                'label' => 'Марка автомобиля',
                'value' => 'mark.name'
            ],
            'engine_capacity',
            'release_date',
            //'color',
            //'gear_type_id',
            //'user_id',
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'value' => function ($model) {
                    return $model->getStatus();
                }
            ],
            [
                'format' => 'raw',
                'value' => function ($model, $key) {
                    return Html::a('Обновить статус', ['update-status', 'id' => $model->id], ['class' => 'btn btn-secondary']);
                }

            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],

        ],
    ]); ?>


</div>
