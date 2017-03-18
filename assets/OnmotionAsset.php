<?php

namespace humhub\modules\gallery\assets;

use yii\web\AssetBundle;

class OnmotionAsset extends AssetBundle
{
    public $jsOptions = ['position'=> \yii\web\View::POS_END];
    public $sourcePath = '@gallery/resources';
    public $css = [
        'bootstrap-fileinput-4.3.1/css/fileinput.min.css',
        'css/onmotion-gallery.css',
    ];
    public $js = [
        'bootstrap-fileinput-4.3.1/js/plugins/canvas-to-blob.min.js',
        'bootstrap-fileinput-4.3.1/js/fileinput.min.js',
        'js/onmotion-bootstrap-modal.js',
        'js/onmotion-gallery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
