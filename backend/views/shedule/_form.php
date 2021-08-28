<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Shedule */
/* @var $form yii\widgets\ActiveForm */
$category = \common\models\Group::find()->all();
foreach ($category as $c) {
    $group[$c->id] = $c->name;
}
$category = \common\models\Pair::find()->all();
foreach ($category as $c) {
    $pair[$c->id] = $c->pair_name;
}
$category = \common\models\Teacher::find()->all();
foreach ($category as $c) {
    $teacher[$c->id] = $c->first_name . ' ' . $c->last_name;
}
$category = \common\models\Lesson::find()->all();
foreach ($category as $c) {
    $lesson[$c->id] = $c->name;
}
$category = \common\models\Room::find()->all();
foreach ($category as $c) {
    $room[$c->id] = $c->name;
}
?>

<div class="shedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'day')->widget(\janisto\timepicker\TimePicker::className(), [
                //'language' => 'fi',
                'mode' => 'date',
                'clientOptions' => [
            'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => 'HH:mm:ss',
                    'showSecond' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
                'data' => $group,
                'language' => 'ru',
                'options' => ['placeholder' => 'Select a group ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'pair_id')->widget(Select2::classname(), [
                'data' => $pair,
                'language' => 'ru',
                'options' => ['placeholder' => 'Select a pair ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'teacher_id')->widget(Select2::classname(), [
                'data' => $teacher,
                'language' => 'ru',
                'options' => ['placeholder' => 'Select a teacher ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'lesson_id')->widget(Select2::classname(), [
                'data' => $lesson,
                'language' => 'ru',
                'options' => ['placeholder' => 'Select a lesson ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'room_id')->widget(Select2::classname(), [
                'data' => $room,
                'language' => 'ru',
                'options' => ['placeholder' => 'Select a room ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
