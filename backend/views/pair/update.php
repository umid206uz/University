<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pair */

$this->title = Yii::t('app', 'Update Pair: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pair-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
