<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="HuGF6Es1OwjeR8rfvIzva0D83O3Z5hQ67FonAefF">

    <title>    Login
        |Barang</title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/AdminLTE.min.css">
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome.min.css">
</head>
<body class="hold-transition lockscreen">
    <div id="app">
        <div style="display: none;" class="modal fade" id="exampleModal" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="POST" action="http://apanel.tnl.ir/password/reset">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Reset Password</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="form-control-label"><b>E-Mail
                                    Address:</b></label>
                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                                    </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="InJ447w5srSiE5YbpdkV2XWXkgpOLxHpE5YNWuGM">
                            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <p><b>Barang</b>Food</p>
        </div>
            <div class="lockscreen-name" id="lockscreen-name" style="text-align:center;">Health Barang Dish</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="<?php echo Yii::$app->request->baseUrl; ?>/img/user.png" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" action="/admin" method="post">
                <div class="input-group">
                  <input type="password" placeholder="password" name="password" class="form-control" style="border:1px solid white;text-align:center;padding-top:12px;">
                  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="input-group-btn">
                     <button type="submit" name="login-button" class="btn" style="border: 1px solid white; background: white none repeat scroll 0% 0%;"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>

        <!-- /.lockscreen-item -->

        <div class="help-block text-center">
            Enter your password to retrieve your session

        </div>

        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="text-center">
            <a href="" data-toggle="modal" data-target="#exampleModal">Forgot Password</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2017-2017 <b><a href="https://cotint.ir" class="text-black">Powered by Cotint</a></b><br>
            All rights reserved
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/app.js"></script>
</body>
</html>
