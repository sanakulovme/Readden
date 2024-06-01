<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/auth.css',
        'css/app.css'
    ];

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}
