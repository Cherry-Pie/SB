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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lib/bootstrap/bootstrap.css',
        'css/lib/perfectscrollbar/perfect-scrollbar.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'css/lib/ionicons/ionicons.min.css',
        'css/lib/datatables/datatables.css',
        'css/lib/daterangepicker/daterangepicker-bs3.css',
        'css/lib/jqvmap/jqvmap.css',
        'css/lib/tabdrop/tabdrop.css',
        'css/styles.css',
        'css/custom-styles.css',
        'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic'

    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        'js/lib/chart.js/chart.js',
        'js/lib/bootstrap/bootstrap.min.js',
        'js/lib/slimscroll/jquery.slimscroll.min.js',
        'js/lib/tabdrop/bootstrap-tabdrop.js',
        'js/scripts.js',
        'http://code.highcharts.com/highcharts.js',
        'http://code.highcharts.com/maps/modules/map.js',
        'http://code.highcharts.com/maps/modules/data.js',
        'http://code.highcharts.com/mapdata/custom/world.js',
        'js/kernel.js',
        'js/jquery.tablesorter.js',
        'js/lib/moment/moment-with-locales.min.js',
        'js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
        'js/lib/3jstudio/core.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
