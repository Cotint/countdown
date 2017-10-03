<?php

/* @var $this yii\web\View */

?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */

$date = new \mjm\jdate\DateTime(true, true, 'Asia/Tehran');
?>

<script src="https://cdn.ckeditor.com/4.7.2/basic/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.on('dialogDefinition', function (ev) {
        // Take the dialog name and its definition from the event data.
        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;
        // Check if the definition is from the dialog we're
        // interested in (the 'image' dialog).
        if (dialogName == 'image') {
            // Get a reference to the 'Image Info' tab.
            var infoTab = dialogDefinition.getContents('info');
            // Remove unnecessary widgets/elements from the 'Image Info' tab.
            infoTab.remove('browse');
            infoTab.remove('txtHSpace');
            infoTab.remove('txtVSpace');
            infoTab.remove('txtBorder');
            infoTab.remove('txtAlt');
            infoTab.remove('txtWidth');
            infoTab.remove('txtHeight');
            infoTab.remove('htmlPreview');
            infoTab.remove('cmbAlign');
            infoTab.remove('ratioLock');
        }
    });

    CKEDITOR.config.contentsLangDirection = 'rtl';

    CKEDITOR.replace('editor');
</script>



<div class="site-index">

    <?php $baseUrl = Yii::$app->request->url;?>
    <?php $base_u = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl; ?>
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
            <?php if($baseUrl == '/countdown/basic/web/site/index'){?>
                <li class="active"><a href="<?= $base_u ?>/site/index"> درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>

            <?php }else{?>
                <li><a href="<?= $base_u ?>/site/index">  درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>
            <?php }?>

            <?php if($baseUrl == '/countdown/basic/web/index.php?r=email/admin'){?>
                <li class="active"><a href="<?= $base_u ?>/email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>

            <?php }else{?>
                <li><a href="<?= $base_u ?>/email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
            <?php }?>
            <?php if($baseUrl == '/countdown/basic/web/index.php?r=contact/admin'){?>
                <li class="active"><a href="<?= $base_u ?>/contact/admin"> پیام های دریافتی   <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>

            <?php }else{?>
                <li><a href="<?= $base_u ?>/contact/admin">  پیام های دریافتی <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>
            <?php }?>
            <li><?= Html::a('خروج', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>

        </ul>

    </div>


    <div class="info-form  container">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form">
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
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'tumblr')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'time')->textInput(['maxlength' => true,'id'=>'timepicker', 'value' => $jalaliDate]) ?>
            <span id="span1"></span>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="header_form">
            <?= $form->field($model, 'imageFile')->fileInput() ?>
            <?= $form->field($model, 'logo')->hiddenInput()->label(false) ?>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="header_form">
            <?= Html::submitButton($model->isNewRecord ? 'ایجاد' : 'ایجاد', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php

    $this->registerJs(
        "jQuery(function() {
            jQuery('#timepicker, #span1').persianDatepicker();       
        });",
        \yii\web\View::POS_END
    );


    ?>
