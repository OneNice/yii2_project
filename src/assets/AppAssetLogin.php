<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetLogin extends AssetBundle
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
        '/admin_ssets/js/jquery.min.js',
        '/admin_assets/js/bootstrap.bundle.min.js',
        '/admin_assets/js/metisMenu.min.js',
        '/admin_assets/js/waves.js',
        '/admin_assets/js/jquery.slimscroll.js',
        '/admin_assets/js/jquery.core.js',
        '/admin_assets/js/jquery.app.js',
    ];
}
