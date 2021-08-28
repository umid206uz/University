<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
use common\models\Room;
/* @var $this yii\web\View */
/* @var $model common\models\SheduleSearch */
/* @var $form yii\widgets\ActiveForm */
$rooms = Room::find()->all();
foreach ($rooms as $c) {
    $room[$c->id] = $c->name;
}
?>

<div class="shedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'room_id')->widget(Select2::classname(), [
                'data' => $room,
                'language' => 'ru',
                'options' => ['placeholder' => Yii::t("app", "Select a room")],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(Yii::t("app", "Select a room"));
            ?>
        </div>
        <div class="col-md-6">
            <?php  echo $form->field($model, 'day')->widget(DateTimePicker::classname(), [
                'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'options' => ['placeholder' => Yii::t("app", "Select a time")],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd hh:ii:ss',
                    'startDate' => '01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
                ]
            ])->label(Yii::t("app", "Select a time"));
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
