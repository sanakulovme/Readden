<?php


namespace frontend\assets;

use yii\web\AssetBundle;

class MyAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/mystyle.css',
    ];
    public $js = [
        'js/myjs.js',
    ];
}



 ?>