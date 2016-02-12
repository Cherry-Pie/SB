<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'site/css/lib/bootstrap/bootstrap.css',
        'site/css/lib/perfectscrollbar/perfect-scrollbar.css',
        'site/css/lib/font-awesome/font-awesome.css',
        'site/css/lib/ionicons/ionicons.min.css',
        'site/css/lib/datatables/datatables.css',
        'site/css/lib/daterangepicker/daterangepicker-bs3.css',
        'site/css/lib/jqvmap/jqvmap.css',
        'site/css/lib/tabdrop/tabdrop.css',
        'site/css/styles.css',
        'site/css/custom-styles.css',
        'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic'

    ];
    public $js = [
        'site/js/lib/chart.js/chart.js',
        'site/js/lib/bootstrap/bootstrap.min.js',
        'site/js/lib/slimscroll/jquery.slimscroll.min.js',
        'site/js/lib/tabdrop/bootstrap-tabdrop.js',
        'site/js/scripts.js',
        'http://code.highcharts.com/highcharts.js',
        'http://code.highcharts.com/maps/modules/map.js',
        'http://code.highcharts.com/maps/modules/data.js',
        'http://code.highcharts.com/mapdata/custom/world.js',
        // 'site/js/kernel.js',
        // 'site/js/jquery.tablesorter.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
