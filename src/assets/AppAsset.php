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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/slick-theme.css',
        'css/slick.css',
        'css/jquery-ui.css',
        'css/style.css',
        'css/bootstrapValidator.min.css',
        'admin_assets/plugins/switchery/switchery.min.css',
        'admin_assets/plugins/sweet-alert/sweetalert2.min.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/jquery-ui.min.js',
        'js/slick.min.js',
        'js/validate.min.js',
        'js/language/ru_RU.js',
        'admin_assets/plugins/switchery/switchery.min.js',
        'admin_assets/plugins/sweet-alert/sweetalert2.min.js',
        'admin_assets/plugins/isotope/js/isotope.pkgd.min.js',
        'js/helper.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
