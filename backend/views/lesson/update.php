<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lesson */

$this->title = Yii::t('app', 'Update Lesson: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lessons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lesson-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
