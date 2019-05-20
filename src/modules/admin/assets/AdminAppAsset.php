<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class AdminAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/admin_assets/plugins/dropzone/dropzone.css',
        '/admin_assets/plugins/jquery-toastr/jque',
        '/admin_assets/css/bootstrap.min.css',
        '/admin_assets/css/icons.css',
        '/admin_assets/plugins/select2/css/select2.min.css',
        '/admin_assets/css/metismenu.min.css',
        '/admin_assets/css/style.css',
        '/admin_assets/css/bootstrap-datetimepicker-standalone.min.css',
        '/admin_assets/css/bootstrap-datetimepicker.min.css',
        '/admin_assets/plugins/tooltipster/tooltipster.bundle.min.css',

    ];
    public $js = [
        '/admin_assets/js/modernizr.min.js',
        '/admin_assets/js/jquery.min.js',
        '/admin_assets/js/bootstrap.bundle.min.js',
        '/admin_assets/js/metisMenu.min.js',
        '/admin_assets/js/jquery.slimscroll.js',
        '/admin_assets/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript',
        '/admin_assets/plugins/tooltipster/tooltipster.bundle.min.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.min.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.time.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.tooltip.min.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.resize.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.pie.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.crosshair.js',
        '/admin_assets/plugins/flot-chart/curvedLines.js',
        '/admin_assets/plugins/flot-chart/jquery.flot.axislabels.js',
        '/admin_assets/plugins/jquery-knob/jquery.knob.js',
        '/admin_assets/pages/jquery.dashboard.init.js',
        '/admin_assets/plugins/tooltipster/tooltipster.bundle.min.js',
        '/admin_assets/plugins/select2/js/select2.min.js',
        '/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
        '/admin_assets/js/jquery.core.js',
        '/admin_assets/js/jquery.app.js',
        '/admin_assets/js/helpMePls.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}