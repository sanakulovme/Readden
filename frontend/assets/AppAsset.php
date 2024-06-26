<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/index.css',
        'css/index.media-query.css',
        'css/app.css'
    ];

    public $js = [
        "js/main.index.js",
        "js/scrollreveal.min.js",
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}
