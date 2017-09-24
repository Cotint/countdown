<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin([
  'id' => 'login-form',
  'layout' => 'horizontal',
  'fieldConfig' => [
    //            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    //            'labelOptions' => ['class' => 'col-lg-1 control-label'],
  ],
]); ?>

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="#"><b><?php echo $lastone->username;?></b></a>
    </div>
    <!-- User name -->
    <!--    <div class="lockscreen-name" id="lockscreen-name" style="text-align:center;">--><?php //echo $lastone->username;?><!--</div>-->

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/img/user1-128x128.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials">
            <div class="input-group">
              <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>'password','style'=>'border:1px solid white;text-align:center;padding-top:12px;']) ?>
                <div class="input-group-btn">
                  <?= Html::submitButton('<i class="fa fa-arrow-right text-muted"></i>', ['class' => 'btn', 'name' => 'login-button','style'=>'border:1px solid white;background:white;']) ?>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>


</div>
<!-- /.center -->
</body>

<?php ActiveForm::end(); ?>
