<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this ContactController */
/* @var $model Contact */

?>

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


   <!-- Main content -->

      <div class="container">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="table">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th id="table_head">شماره</th>
                  <th id="table_head">نام</th>
                  <th id="table_head">ایمیل</th>
                  <th id="table_head">پیام</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($contact as $contact){?>
                <tr>
                  <td><?php echo $contact->id;?></td>
                  <td><?php echo $contact->name;?></td>
                  <td><?php echo $contact->email;?></td>
                  <td><?php echo $contact->message;?></td>
                </tr>
             <?php }?>


                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>






          <?php
          $this->registerJs(
            "
                    $('#example2').DataTable({
                        'paging'      : true,
                        'lengthChange': false,
                        'searching'   : false,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : false
                    })
                ",
            \yii\web\View::POS_END
          );
          ?>
