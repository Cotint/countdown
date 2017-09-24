<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/fontawesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/main.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/respond.min.js"></script>

    <![endif]-->

</head>

<?php $this->beginBody() ?>

<body class="hold-transition skin-blue sidebar-mini">


</ul>

<div class="tab-content no-padding">
    <!-- Morris chart - Sales -->
    <div><?php echo $content; ?></div>
</div>
</div>
<!-- /.nav-tabs-custom -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
