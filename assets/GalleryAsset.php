<?php

namespace humhub\modules\gallery\assets;

use yii\web\AssetBundle;

class GalleryAsset extends AssetBundle
{
    public $jsOptions = ['position'=> \yii\web\View::POS_END];
    public $sourcePath = '@gallery/resources';
    public $css = [
        'css/blueimp-gallery.min.css',
    ];
    public $js = [
        'js/blueimp-gallery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
