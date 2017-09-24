<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [

      'js/bootstrap.min.js',
      'js/fastclick.js',
      'js/adminlte.min.js',
      'js/jquery.sparkline.min.js',
      'js/jquery-jvectormap-1.2.2.min.js',
      'js/jquery-jvectormap-world-mill-en.js',
      'js/jquery.slimscroll.min.js',
      'js/dashboard2.js',
      'js/demo.js',
      'js/jquery.dataTables.min.js',
      'js/dataTables.bootstrap.min.js',
      'js/fastclick.js',
//      'js/ckeditor',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
