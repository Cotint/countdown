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
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
    <h3>Enter Your New Password</h3>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form" style="font-size:15px;">
        <?= $form->field($model, 'password')->passwordInput(['name'=>'User[password]','id'=>'user-password']) ?>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form" style="font-size:15px;">
        <?= $form->field($model, 'repeatpassword')->passwordInput(['name'=>'User[repeatpassword]','id'=>'user-repeatpassword']) ?>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Create', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div></div>
    <?php ActiveForm::end(); ?>

</div>