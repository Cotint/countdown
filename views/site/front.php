<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/12/2017
 * Time: 3:07 PM
 */

use yii\helpers\Html;
$ur = Yii::$app->request->hostInfo;
$base_u = $ur . Yii::$app->request->baseUrl;
/* @var $this yii\web\View */
/* @var $model app\models\Email */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>famaham</title>
    <meta name="description" content="A responsive coming soon template, un template HTML pour une page en cours de construction">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/pageloader.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/fonts/opensans/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/fonts/asap/stylesheet.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/foundation.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/js/vendor/jquery.fullPage.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/js/vegas/vegas.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/main_responsive.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/style-font1.css">
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/vendor/modernizr.js"></script>
</head>

<body id="menu" class="alt-bg">
<div class="page-loader" id="page-loader">
    <div><i class="ion ion-loading-d"></i><p>famaham</p></div>
</div>
<header class="header-top">
    <div class="logo">
        <a href="#home">
<!--            <img src="img/logo.png" alt="Logo Brand">-->
            <img src="uploads/<?= $info->logo;?>" alt="Logo Brand">
        </a>
    </div>
    <div class="menu clearfix">
        <a href="#about-us">درباره ما</a>
        <a href="#contact">تماس</a>
    </div>
</header>
<nav class="quick-link count-6 nav-left">
    <ul id="qmenu">
        <li data-menuanchor="home">
            <a href="#home" class=""><i class="icon ion ion-home"></i>
            </a>
            <span style="font-size:18px;" class="title">خانه</span>
        </li>
        <li data-menuanchor="when">
            <a href="#when" class=""><i class="icon ion ion-android-alarm"></i>
            </a>
            <span style="font-size:18px;" class="title">زمان</span>
        </li>
        <li data-menuanchor="register">
            <a href="#register"><i class="icon ion ion-compose"></i>
            </a>
            <span style="font-size:18px;" class="title">خبرنامه</span>
        </li>
        <li data-menuanchor="about-us">
            <a href="#about-us"><i class="icon ion ion-android-information"></i>
            </a>
            <span style="font-size:18px;" class="title">درباره ما</span>
        </li>
        <li data-menuanchor="contact">
            <a href="#contact"><i class="icon ion ion-android-call"></i>
            </a>
            <span style="font-size:18px;" class="title">تماس</span>
        </li>
        <li data-menuanchor="contact">
            <a href="#contact/message"><i class="icon ion ion-email"></i>
            </a>
            <span style="font-size:18px;" class="title">فرم</span>
        </li>
    </ul>
</nav>
<div class="page-cover" id="home">
    <div class="cover-bg pos-abs full-size bg-img" data-image-src="<?php echo $base_u; ?>//img/bg-slide3.jpg"></div>
    <div class="cover-bg pos-abs full-size slide-show">
        <i class='img' data-src='<?php echo $base_u; ?>/img/bg-slide1.jpg'></i>
        <i class='img' data-src='<?php echo $base_u; ?>/img/bg-slide2.jpg'></i>
        <i class='img' data-src='<?php echo $base_u; ?>/img/bg-slide3.jpg'></i>
        <i class='img' data-src='<?php echo $base_u; ?>/img/bg-slide2.jpg'></i>
    </div>
    <div class="cover-bg pos-abs full-size bg-color" data-bgcolor="rgba(51, 2, 48, 0.12)"></div>

</div>
<main class="page-main" id="mainpage">
    <div class="section page-home page page-cent" id="s-home">
        <div class="logo-container">
<!--            <img style="height:60px; class="h-logo" src="img/logo.png" alt="Logo">-->
            <img style="height:60px; class="h-logo" src="uploads/<?= $info->logo; ?>" alt="Logo">
        </div>
        <section class="content">
            <header class="header">
                <div class="h-left">
                    <h2>fama <strong>ham</strong></h2>
                </div>
                <div class="h-right">
                    <h3> <br></h3>
                    <h4 class="subhead"><a href="#when">به زودی</a></h4>
                </div>
            </header>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#when">
                <div class="arrow-d">
                    <div class="before">زمان</div>
                    <div class="after">زمان</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>
    <div class="section page-when page page-cent" id="s-when">
        <section class="content">
            <div class="clock clock-countdown">
                <div class="site-config"

                data-date=<?= $info->time; ?>
                     data-date-timezone="+0"
                ></div>
                <header class="header">
                    به <strong>زودی</strong>
                </header>
                <div class="elem-left">
                    <div class="digit hours">00</div>
                    <div class="text">ساعت</div>
                </div>
                <div class="elem-center">
                    <span class="text top">
<!--                        <img class="img" alt="Logo" src="img/logo.png">-->
                        <img class="img" alt="Logo" src="uploads/<?= $info->logo; ?>">
                    </span>
                    <div class="digit days">000</div>
                    <div class="text">روز</div>
                </div>
                <div class=" elem-right">
                    <div class="digit minutes">00</div>
                    <div class="text">دقیقه</div>
                </div>
                <div class="second">
                    <input class="knob container"
                           id="second-knob"
                           data-width="400"
                           data-height="400"
                           data-displayInput=false
                           data-fgColor="#fff"
                           data-bgColor="rgba(255,255,255,0)"
                           data-thickness=".07"
                           value="0"
                           data-displayPrevious=true
                           data-max="6000"
                    />
                </div>
            </div>

        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#register">
                <div class="arrow-d">
                    <div class="before">&#1582;&#1576;&#1585;</div>
                    <div class="after">&#1582;&#1576;&#1585;</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>
    <div class="section page-register page page-cent " id="s-register">
        <section class="content">
            <header class="p-title">
                <h3>خبر نامه <i class="ion ion-compose"></i></h3>
            </header>
            <div>
                <?= Html::beginForm(['site/front'], 'post', ['enctype' => 'multipart/form-data', 'class'=>'form magic send_email_form subfrm', 'id' => 'mail-subscription']) ?>
                    <p class="invite center">لطفا ایمیل خود را در زیر بنویسید تا با ما در تماس باشید</p>
                    <div class="fields clearfix">
                        <div class="input">
                            <?= Html::submitButton('ارسال', ['class' => 'form-src-btn button','id'=>'submitmail','data-url'=>Yii::$app->request->hostInfo . Yii::$app->request->baseUrl]) ?>
                            	<label class="float-left hidden-vp left-form-label"> &#1575;&#1740;&#1605;&#1740;&#1604;</label>
<?= Html::input('email', 'Email[email]','', ['id'=>'email-email','class' => 'email_f requiredField class-input','placeholder'=>'لطفا ایمیل خود را وارد کنید']) ?>
                        </div>
                    </div>
                <div id="savemail" style="color:white;text-align: center;margin-top: 30px;display:none;">ایمیل شما ارسال شد</div>
                <?= Html::endForm() ?>
            </div>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#about-us">
                <div class="arrow-d">
                    <div class="before">&#1583;&#1585;&#1576;&#1575;&#1585;&#1607;</div>
                    <div class="after">&#1583;&#1585;&#1576;&#1575;&#1585;&#1607;</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>
    <div class="section page-about page page-cent" id="s-about-us">
        <section class="content">
            <header class="p-title">
                <h3>درباره ما<i class="ion ion-android-information">
                    </i>
                </h3>
<!--                <h2 style="text-align: right;">لورم <span class="bold">ایپسوم</span> لورم <span class="bold">ایپسوم</span> لورم ایپسوم</h2>-->
            </header>
            <article style="direction:rtl;" class="text">
                <p class="info" style="direction:rtl; text-align: justify;"><?= $info->about; ?></p>
            </article>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#contact">
                <div class="arrow-d">
                    <div class="before">&#1578;&#1605;&#1575;&#1587;</div>
                    <div class="after">&#1578;&#1605;&#1575;&#1587;</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>
    <div class="section page-contact page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-contact">
        <div class="slide" id="information" data-anchor="information">
            <section class="content">
                <header class="p-title">
                    <h3>تماس با ما<i class="ion ion-location">
                        </i>
                    </h3>
                    <ul class="buttons">
                        <li class="show-for-medium-up">
                            <a title="About" href="#about-us" ><i class="ion ion-android-information"></i></a>
                        </li>
                        <li>
                            <a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
                        </li>
                    </ul>
                </header>
                <div class="contact">
                    <div class="row">
                        <div class="medium-6 columns left">
                            <ul>
                                <li>
                                    <h4>ایمیل</h4>
                                    <p><a href="mailto:info@mashbook.ir"><?= $info->email; ?></a></p>
                                </li>
                                <li>
                                    <h4>آدرس</h4>
                                    <p><?= $info->address; ?></p>
                                </li>
                                <li>
                                    <h4>تلفن</h4>
                                    <p><?= $info->phone; ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="medium-6 columns social-links right">
                            <ul>
                                <li class="show-for-medium-up">
                                    <h4>سایت</h4>
                                    <p><a href="http://cotint.ir" target="_blank">cotint.ir</a></p>
                                </li>
                                <li  class="show-for-medium-up">
                                    <h4>شبکه اجتماعی</h4>
                                    <div class="socialnet">
                                        <a target="_blank" href="<?= $info->facebook; ?>"><i class="ion ion-social-facebook"></i></a>
                                        <a target="_blank" href="<?= $info->instagram; ?>"><i class="ion ion-social-instagram"></i></a>
                                        <a target="_blank" href="<?= $info->twitter; ?>"><i class="ion ion-social-twitter"></i></a>
<!--                                        <a href="#"><i class="ion ion-social-pinterest"></i></a>-->
                                        <a target="_blank" href="<?= $info->telegram; ?>"><i class="ion-paper-airplane"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <p>
<!--                                        <img src="img/logo.png" alt="Logo" class="logo">-->
                                        <img src="uploads/<?= $info->logo; ?>" alt="Logo" class="logo">
                                    </p>
                                    <p class="small">Powered By <strong><a href="http://cotint.ir/" target="_blank">Cotint</a></strong></p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="slide" id="message" data-anchor="message">
            <section class="content">
                <header class="p-title">
                    <h3>ارتباط با ما<i class="ion ion-email">
                        </i>
                    </h3>
                    <ul class="buttons">
                        <li class="show-for-medium-up">
                            <a title="About" href="#about-us"><i class="ion ion-android-information"></i></a>
                        </li>
                        <li>
                            <a title="Contact" href="#contact/information"><i class="ion ion-location"></i></a>
                        </li>
                    </ul>
                </header>
                <div class="page-block c-right v-zoomIn">
                    <div class="wrapper">
                        <div>
                            <?= Html::beginForm(['site/front'], 'post', ['enctype' => 'multipart/form-data','class'=>'frm message form send_message_form']) ?>
                                <div class="fields clearfix">
                                    <div class="input">
                                        <div id="savemessage" style="display:none;color:white;">پیغام شما ثبت شد</div>
                                        <?= Html::submitButton('ارسال', ['class' => 'button email_b' ,'id'=>'submitcontact','data-url'=>Yii::$app->request->hostInfo . Yii::$app->request->baseUrl]) ?>
                                        	<label class="float-right2 hidden-vp label-input-contact"> &#1606;&#1575;&#1605;</label>
                                        <?= Html::input('text', 'Contact[name]','', ['placeholder'=>'نام', 'id'=>'contact-name', 'class' => 'class-input']) ?>
                                    </div>
                                </div>
                                <div class="fields clearfix">
                                    <div class="input">
                                        		<label class="float-right3 hidden-vp label-left"> &#1575;&#1740;&#1605;&#1740;&#1604;</label>
                                        <?= Html::input('email', 'Contact[email]','', ['placeholder'=>'ایمیل', 'id'=>'contact-email', 'style' => ' color: #fff;', 'class' => 'class-input']) ?>
                                    </div>
                                </div>
                                <div class="fields clearfix no-border">
                                    <label style="float:right;" for="contact-message">متن </label>
                                    <?= Html::textarea( 'Contact[message]','', ['placeholder'=>'پیام...', 'id'=>'contact-message', 'style' => 'direction:rtl; border: 1px solid #fff; color: #000; font-size: 15px;']) ?>
                                    <div>
                                    </div>
                                </div>

                            <?= Html::endForm() ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<footer class="page-footer">
			<span>شبکه اجتماعی
				<a href="<?= $info->facebook; ?>" target="_blank"><i class="ion icon ion-social-facebook"></i></a>
				<a href="<?= $info->instagram; ?>" target="_blank"><i class="ion icon ion-social-instagram"></i></a>
				<a href="<?= $info->twitter; ?>" target="_blank"><i class="ion icon ion-social-twitter"></i></a>
			</span>
</footer>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/vendor/jquery-1.11.2.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/vendor/all.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.downCount.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/form_script.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/main.js"></script>
<script>
    $('form.frm').submit(function(e){
        e.preventDefault();
        var vUrl = $("#submitcontact").data('url')+'/';
        $.ajax({
            url: vUrl,
            type: 'GET',
            data: {
                name : $("#contact-name").val(),
                email : $("#contact-email").val(),
                message : $("#contact-message").val()
            },
            success:function(data){
                //   alert('message saved');
                var name=document.getElementById("contact-name").value;
                var email=document.getElementById("contact-email").value;
                var message=document.getElementById("contact-message").value;
                if(name != '' && email != '' && message != '') {
                    $("#savemessage").show();
                }
            },
            error:function(data){
//                alert('please fill inputs');
                $("#savemessage").hide();
            },
            contentType: "application/json"

        });
        return false;
    });
</script>
<script>
    $('form.subfrm').submit(function(e){
        e.preventDefault();
        var vUrl = $("#submitmail").data('url')+'/';
        $.ajax({
            url: vUrl,
            type: 'GET',
            data: {
                email : $("#email-email").val(),
            },
            success:function(data){
                //   alert('message saved');
                var email=document.getElementById("email-email").value;
                if(email != '') {
                    $("#savemail").show();
                }
            },
            error:function(data){
//                alert('please fill inputs');
                $("#savemail").hide();
            },
            contentType: "application/json"

        });
        return false;
    });
</script>
<script>
    $('form.frm').submit(function(e){
        e.preventDefault();
        var vUrl = $("#submitcontact").data('url')+'/';
        $.ajax({
            url: vUrl,
            type: 'GET',
            data: {
                name : $("#contact-name").val(),
                email : $("#contact-email").val(),
                message : $("#contact-message").val()
            },
            success:function(data){
                //   alert('message saved');
                var name=document.getElementById("contact-name").value;
                var email=document.getElementById("contact-email").value;
                var message=document.getElementById("contact-message").value;
                if(name != '' && email != '' && message != '') {
                    $("#savemessage").show();
                }
            },
            error:function(data){
                $("#savemessage").hide();
            },
            contentType: "application/json"

        });
        return false;
    });
</script>
</body>
</html>
