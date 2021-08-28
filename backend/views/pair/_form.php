<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Pair */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pair-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pair_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pair_name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pair_name_en')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'begin_date')->widget(\janisto\timepicker\TimePicker::className(), [
                //'language' => 'fi',
                'mode' => 'time',
                'clientOptions' => [
//            'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => 'HH:mm:ss',
                    'showSecond' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'end_date')->widget(\janisto\timepicker\TimePicker::className(), [
                //'language' => 'fi',
                'mode' => 'time',
                'clientOptions' => [
//            'dateFormat' => 'yy-mm-dd',
                    'timeFormat' => 'HH:mm:ss',
                    'showSecond' => true,
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
