<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/11/2017
 * Time: 2:59 PM
 */
?>

<?php $baseUrl = Yii::$app->request->url;?>
<?php $base_u = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl; ?>
<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom ">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
      <?php if($baseUrl == '/countdown/basic/web/index.php?r=info/create'){?>
          <li class="active"><a href="<?= $base_u ?>/site/index"> درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>

      <?php }else{?>
          <li><a href="<?= $base_u ?>/site/index">  درباره ما <i class="fa fa-user" aria-hidden="true"></i></a></li>
      <?php }?>

      <?php if($baseUrl == '/countdown/basic/web/index.php?r=email/admin'){?>
          <li class="active"><a href="<?= $base_u ?>/?r=email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>

      <?php }else{?>
          <li><a href="<?= $base_u ?>/email/admin"> اشتراک <i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
      <?php }?>
      <?php if($baseUrl == '/countdown/basic/web/index.php?r=contact/admin'){?>
          <li class="active"><a href="<?= $base_u ?>/contact/admin"> پیام های دریافتی   <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>

      <?php }else{?>
          <li><a href="<?= $base_u ?>/contact/admin">  پیام های دریافتی <i class="fa fa-get-pocket" aria-hidden="true"></i></a></li>
      <?php }?>

        <li><a href="/site/logout">خروج <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        <li><a target="_blank" href="">نمایش سایت <i class="fa fa-home" aria-hidden="true"></i></a></li>
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
                            <th id="table_head">ایمیل</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($email as $email){?>
                            <tr>
                                <td><?php echo $email->id;?></td>
                                <td><?php echo $email->email;?></td>
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

<!-- page script -->