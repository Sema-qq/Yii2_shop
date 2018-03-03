<?php

namespace app\assets;

use yii\web\AssetBundle;

class ShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/public/css/bootstrap.min.css',
        '/public/css/font-awesome.min.css',
        '/public/css/prettyPhoto.css',
        '/public/css/price-range.css',
        '/public/css/animate.css',
        '/public/css/main.css',
        '/public/css/responsive.css',
    ];
    public $js = [
        '/public/js/jquery.js',
        '/public/js/bootstrap.min.js',
        '/public/js/jquery.scrollUp.min.js',
        '/public/js/price-range.js',
        '/public/js/jquery.prettyPhoto.js',
        '/public/js/main.js',
    ];
}