<?php
/**
 * Created by PhpStorm.
 * User: onela
 * Date: 11.05.2019
 * Time: 22:34
 */

namespace app\assets;


use yii\web\AssetBundle;

class LkAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/admin_assets/css/bootstrap.min.css',
        '/admin_assets/css/icons.css',
        '/admin_assets/css/metismenu.min.css',
        '/admin_assets/css/style.css',
    ];
    public $js = [
        '/admin_assets/js/modernizr.min.js',
        '/admin_assets/js/jquery.min.js',
        '/admin_assets/js/bootstrap.bundle.min.js',
        '/admin_assets/js/metisMenu.min.js',
        '/admin_assets/js/jquery.slimscroll.js',
        '/admin_assets/plugins/waypoints/lib/jquery.waypoints.min.js',
        '/admin_assets/plugins/counterup/jquery.counterup.min.js',
        '/admin_assets/js/jquery.core.js',
        '/admin_assets/js/jquery.app.js',
        '/js/lk.js',
    ];
}