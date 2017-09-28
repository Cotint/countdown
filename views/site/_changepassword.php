<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 9/27/17
 * Time: 10:10 AM
 */
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3>Enter Your New Password</h3>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
        <?= $form->field($model, 'password')->passwordInput(['name'=>'User[password]']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Create', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>