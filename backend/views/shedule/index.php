<?php

use common\models\Room;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Shedules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shedule-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Shedule'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'group_id',
                'value' => function($model) {
                    return $model->group->name;
                },
            ],
            [
                'attribute' => 'teacher_id',
                'value' => function($model) {
                    return $model->teacher->last_name;
                },
            ],
            [
                'attribute' => 'lesson_id',
                'value' => function($model) {
                    return $model->lesson->name;
                },
            ],
            [
                'attribute' => 'room_id',
                'value' => function($model) {
                    return $model->room->name;
                }
            ],
            [
                'attribute' => 'pair_id',
                'value' => function($model) {
                    return $model->pair->pair_name;
                },
            ],
            [
                'attribute' => 'day',
                'value' => function($model) {
                    return $model->day . ' ' . $model->pair->begin_date . '/' . $model->pair->end_date;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
