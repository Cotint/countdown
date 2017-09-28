<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/12/2017
 * Time: 3:07 PM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Email */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tnlmall</title>
  <meta name="description" content="tnl">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/clock.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/main_firstpage.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/responsive.css">
  <link href="<?php echo Yii::$app->request->baseUrl; ?>/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/js/modernizr-2.6.2.min.js"></script>
</head>

<body onload="init()" class="snowflakes">

<?php //if(Yii::$app->session->getFlash('successmail')!='' ){
//  echo '<script>alert("'.Yii::$app->session->getFlash('successmail').'");</script>';
//} ?>




<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/ThreeCanvas.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/snow.js" type="text/javascript" charset="utf-8"></script>
<div id="snow" data-img="<?php echo Yii::$app->request->baseUrl; ?>/img/snow.png"></div>
<section class="main-menu-container">
  <div class="show_toggle"><a href="#"></a></div>
  <ul class="main-menu">



      <li><a href="#" data-page="contacts">تماس با ما</a></li>
    <li><a href="#" data-page="about">درباره ما</a></li>
    <li><a href="#" data-page="services">سرویس</a></li>
    <li><a href="#" class="home-link">خانه</a></li>
  </ul>
</section>
<section class="mainarea">
  <div id="clock" class="active">
    <div class="clock-container">
      <div id="time-container-wrap">
        <div id="time-container">
          <div class="numbers-container"></div>
          <span style="left:160px !important;" id="timeleft" class="clock-label"></span>
          <figure id="canvas"></figure>
        </div>
      </div>
    </div>
    <h3 style="position: relative; top: -40px;">وب سایت ما به زودی راه اندازی می شود</h3>
      <div style="position: relative; top: -40px;" class="subscribe" id="subscribe">
        <?= Html::beginForm(['site/front'], 'post', ['enctype' => 'multipart/form-data','class'=>'subfrm']) ?>
        <?= Html::input('email', 'Email[email]','', ['id'=>'email-email','class' => 'email form_item requiredField','style'=>'direction: rtl;','placeholder'=>'لطفا ایمیل خود را وارد کنید']) ?>

        <?= Html::submitButton('ارسال', ['class' => 'btn','id'=>'submitmail','style'=>'font-weight:bold;font-family: IRANSans !important;','data-url'=>Yii::$app->request->hostInfo . Yii::$app->request->baseUrl]) ?>
<!--        --><?php //if(Yii::$app->session->getFlash('successmail')!='' ){
//          echo '<div style="color:white;">'.Yii::$app->session->getFlash('successmail') .'</div>';
//        } ?>
          <div id="savemail" style="color:white;display:none;">ایمیل شما ارسال شد</div>
        <?= Html::endForm() ?>
      </div>







      <div id="form_results"></div>
  </div>
  <div class="mainarea-content">
    <div id="services" data-page="services" class="side-page side-left went-left">
      <div class="container">
        <h2 style="font-size: 48px;" class="title">چه کاری انجام می دهیم</h2>
        <ul class="services">
          <li><img src="<?php echo Yii::$app->request->baseUrl; ?>/img/icons/promotion-icon.png" alt="" /><p>ترفیع</p></li>
          <li><img src="<?php echo Yii::$app->request->baseUrl; ?>/img/icons/web-desing-icon.png" alt="" /><p>طراحی وب سایت</p></li>
          <li><img src="<?php echo Yii::$app->request->baseUrl; ?>/img/icons/photography-icon.png" alt="" /><p>عکاسی</p></li>
        </ul>
        <p><?php echo $info->service;?></p>

      </div>
    </div>
    <div id="about" data-page="about" class="side-page active">
      <div class="container">
          <h2 style="font-size: 48px;" class="title">ما که هستیم</h2>
          <p><?php echo $info->about;?></p>
      </div>
    </div>


          <div id="contacts" data-page="contacts" class="side-page side-right went-right" >
      <div class="container">
        <h2 class="title">در تماس بودن</h2>
        <p><?php echo $info->address;?></p>
        <p>P: 021-21211134 · info@cotint.com</p>



          <div class="contact-list">
            <?= Html::beginForm(['site/front'], 'post', ['enctype' => 'multipart/form-data','class'=>'frm']) ?>
              <div class="field-row">
            <?= Html::input('text', 'Contact[name]','', ['placeholder'=>'نام','id'=>'contact-name']) ?>
              </div>
              <div class="field-row">
            <?= Html::input('email', 'Contact[email]','', ['placeholder'=>'ایمیل','id'=>'contact-email']) ?>
              </div>
              <div class="field-row">
            <?= Html::input('text', 'Contact[message]','', ['placeholder'=>'پیام','id'=>'contact-message']) ?>
              </div> <div id="savemessage" style="display:none;color:white;">پیغام شما ثبت شد</div>
            <?= Html::submitButton('ثبت', ['class' => 'btn' ,'id'=>'submitcontact','style'=>'font-weight:bold;font-family: IRANSans !important;','data-url'=>Yii::$app->request->hostInfo . Yii::$app->request->baseUrl]) ?>

            <?= Html::endForm() ?>
          </div>

      </div>
    </div>
  </div>



  <a class="close" href="#"><img alt="" src="<?php echo Yii::$app->request->baseUrl; ?>/img/close.png"></a>
</section>
<section class="social-container">
  <ul class="social">
    <a href="<?php echo $info->facebook; ?>"><i style="font-size: 20px; color: #fff;" class="fa fa-facebook" ></i></a>
    <a href="<?php echo $info->instagram ; ?>"><i style="font-size: 20px; color: #fff;" class="fa fa-instagram"></i></a>
      <a href="<?php echo $info->telegram ; ?>"><i style="font-size: 20px; color: #fff;" class="fa fa-paper-plane"></i></a>
      <a href="<?php echo $info->aparat; ?>"><i style="font-size: 20px; color: #fff;" class="fa fa-film"></i></a>
  </ul>
</section>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/jquery.cycle.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/main.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/clock/js/svg.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/clock/js/svg.easing.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/clock/js/svg.clock.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/clock/js/jquery.timers.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/clock/js/clock.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
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
    var SCREEN_WIDTH = window.innerWidth;
    var SCREEN_HEIGHT = window.innerHeight;
    var container;
    var particle;
    var camera;
    var scene;
    var renderer;
    var mouseX = 0;
    var mouseY = 0;
    var windowHalfX = window.innerWidth / 2;
    var windowHalfY = window.innerHeight / 2;
    var particles = [];
    var particleImage = new Image();
    particleImage.src = 'http://localhost/basic/web/img/snow.png';
    function init() {
        container = document.createElement('div');
        container.setAttribute('id', 'snowflakes');
        document.body.appendChild(container);
        camera = new THREE.PerspectiveCamera( 75, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000 );
        camera.position.z = 1000;
        scene = new THREE.Scene();
        scene.add(camera);
        renderer = new THREE.CanvasRenderer();
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
        var material = new THREE.ParticleBasicMaterial( { map: new THREE.Texture(particleImage) } );
        for (var i = 0; i < 500; i++) {
            particle = new Particle3D( material);
            particle.position.x = Math.random() * 2000 - 1000;
            particle.position.y = Math.random() * 2000 - 1000;
            particle.position.z = Math.random() * 2000 - 1000;
            particle.scale.x = particle.scale.y =  1;
            scene.add( particle );
            particles.push(particle);
        }
        container.appendChild( renderer.domElement );
        document.addEventListener( 'mousemove', onDocumentMouseMove, false );
        document.addEventListener( 'touchstart', onDocumentTouchStart, false );
        document.addEventListener( 'touchmove', onDocumentTouchMove, false );
        setInterval( loop, 1000 / 60 );
    }
    function onDocumentMouseMove( event ) {

        mouseX = event.clientX - windowHalfX;
        mouseY = event.clientY - windowHalfY;
    }
    function onDocumentTouchStart( event ) {
        if ( event.touches.length == 1 ) {
            event.preventDefault();
            mouseX = event.touches[ 0 ].pageX - windowHalfX;
            mouseY = event.touches[ 0 ].pageY - windowHalfY;
        }
    }
    function onDocumentTouchMove( event ) {
        if ( event.touches.length == 1 ) {
            event.preventDefault();
            mouseX = event.touches[ 0 ].pageX - windowHalfX;
            mouseY = event.touches[ 0 ].pageY - windowHalfY;
        }
    }
    function loop() {
        for(var i = 0; i<particles.length; i++)
        {
            var particle = particles[i];
            particle.updatePhysics();
            with(particle.position)
            {
                if(y<-1000) y+=2000;
                if(x>1000) x-=2000;
                else if(x<-1000) x+=2000;
                if(z>1000) z-=2000;
                else if(z<-1000) z+=2000;
            }
        }
        camera.position.x += ( mouseX - camera.position.x ) * 0.05;
        camera.position.y += ( - mouseY - camera.position.y ) * 0.05;
        camera.lookAt(scene.position);
        renderer.render( scene, camera );
    }

</script>


