<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shedule */

$this->title = Yii::t('app', 'Create Shedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shedule-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
