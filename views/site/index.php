<?php

/* @var $this yii\web\View */

?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="https://cdn.ckeditor.com/4.7.2/basic/ckeditor.js"></script>

<div class="site-index">

  <?php $baseUrl = Yii::$app->request->url;?>
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
          <?php if($baseUrl == '/countdown/basic/web/index.php?r=info/create'){?>
              <li class="active"><a href="/basic/web/info/create"> درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>

          <?php }else{?>
              <li><a href="/basic/web/info/create">  درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>
          <?php }?>

          <?php if($baseUrl == '/countdown/basic/web/index.php?r=email/admin'){?>
              <li class="active"><a href="/basic/web/email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>

          <?php }else{?>
              <li><a href="/basic/web/email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
          <?php }?>
          <?php if($baseUrl == '/countdown/basic/web/index.php?r=contact/admin'){?>
              <li class="active"><a href="/basic/web/contact/admin"> پیام های دریافتی   <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>

          <?php }else{?>
              <li><a href="/basic/web/contact/admin">  پیام های دریافتی <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>
          <?php }?>
            <li><?= Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>

        </ul>

    </div>


    <div class="info-form  container">

      <?php $form = ActiveForm::begin(); ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'service')->textarea(['rows' => 6],array('name'=>'Info[service]','style'=>'font-family: IRANSans !important;')) ?>
            <script> CKEDITOR.replace( 'Info[service]' ); </script>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'about')->textarea(['rows' => 6],array('name'=>'Info[about]','style'=>'font-family: IRANSans !important;')) ?>
            <script> CKEDITOR.replace( 'Info[about]' ); </script>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'aparat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
          <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form">
          <?= Html::submitButton($model->isNewRecord ? 'ایجاد' : 'ایجاد', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>

    </div>

