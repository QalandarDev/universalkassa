<?php

namespace frontend\assets;

use rmrevin\yii\fontawesome\CdnProAssetBundle;
use rmrevin\yii\fontawesome\FontAwesome;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        CdnProAssetBundle::class
    ];
}
