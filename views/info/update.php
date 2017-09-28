<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'Update Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="info-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
