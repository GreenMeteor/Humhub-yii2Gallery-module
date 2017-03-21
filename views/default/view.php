<?php

use humhub\modules\gallery\helpers\Translator;
use humhub\modules\gallery\widgets\Gallery;
use humhub\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

\humhub\modules\gallery\assets\GalleryAsset::register($this);
\humhub\modules\gallery\assets\OnmotionAsset::register($this);

/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryFolders */
/* @var $photos humhub\modules\gallery\models\GalleryPhotos */
/* @var $photosModel humhub\modules\gallery\models\GalleryPhotos */

set_time_limit(60);
ini_set('memory_limit', '512M');

$this->params['breadcrumbs'][] = ['label' => 'Gallery', 'url' => ['/gallery']];
$this->params['breadcrumbs'][] = $model->folder_name;

$this->registerJs(<<<JS
$('#preloader').show();
$('body').css('overflow', 'hidden');
window.onload = function() {
	$('body').css('overflow', 'auto');
    $('#preloader').hide();
  };
   $("[data-toggle='tooltip']").tooltip();
JS
);
            echo Html::beginTag('div', ['class' => 'gallery-view']);
            echo \yii\bootstrap\Collapse::widget([
                'items' => [
                    [
                        'label' => $model->folder_name . ' (' . count((array)$photos) . ' photos)',
                        'content' => !empty($model->descr) ? $model->descr : ''
                    ]
                ],
                'options' => [
                    'class' => 'header-collapse'
                ]
            ]);
            $galleryName = $model->folder_name;

            if (!empty($photos)) {
                foreach ($photos as $photo) {
                    $items[] =
                        [
                            'original' => '/img/gallery/' . Translator::rus2translit($galleryName) . '/' . $photo->name,
                            'thumbnail' => '/img/gallery/' . Translator::rus2translit($galleryName) . '/thumb/' . $photo->name,
                            'options' => [
                                'title' => $galleryName,
                                'data-id' => $photo->photo_id,
                            ],
                        ];
                };
            } else {
                echo 'There are no photos yet...';
            }
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php
                    if (!empty($items))
                        echo Gallery::widget([
                            'id' => 'gallery-links',
                            'items' => $items,
                            'pluginOptions' => [
                                'slideshowInterval' => 2000,
                                'transitionSpeed' => 200,
                                ],
                        ]);
                    ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        <?php   $form = ActiveForm::begin(['action' =>['/gallery/gallery-photos-controller/create'], 'options' => ['enctype' => 'multipart/form-data']]);
                echo $form->field($photosModel, 'picture')->fileInput();
                ActiveForm::end();
                echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['#'],
                    ['title' => 'Edit mode', 'class' => 'btn btn-default', 'id' => 'check-toggle',
                        'data-toggle' => "tooltip", 'data-placement' => "top", 'data-trigger' => "hover"]);
                echo Html::a('<i class="glyphicon glyphicon-check"></i>', ['#'],
                    ['title' => 'Check all', 'class' => 'btn btn-default', 'style' => "display:none", 'id' => 'check-all',
                        'data-toggle' => "tooltip", 'data-placement' => "top", 'data-trigger' => "hover"]);

                echo Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['#'],
                    ['title' => 'Reset', 'class' => 'btn btn-default', 'style' => "display:none", 'id' => 'reset-all',
                        'data-toggle' => "tooltip", 'data-placement' => "top", 'data-trigger' => "hover"]);
                echo Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::toRoute('photos-delete'),
                    ['title' => 'Delete photos', 'class' => 'btn btn-danger', 'style' => "display:none", 'id' => 'photos-delete-btn',
                        'data-toggle' => "tooltip", 'data-placement' => "top", 'data-trigger' => "hover",
                        'role' => 'modal-toggle',
                        'data-modal-title'=>'Delete photos',
                        'data-modal-body'=>'Are you sure?',
                    ]);
echo Html::endTag('div');

Modal::begin([
    "id" => "gallery-modal",
    'header' => '<h4 class="modal-title"></h4>',
    "footer" =>
        Html::a('Close', ['#'],
            ['title' => 'Cancel', 'class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
        Html::a('ОК', Url::toRoute('photos-delete'),
            ['title' => '', 'class' => 'btn btn-primary', 'id' => 'photos-delete-confirm-btn']),
]);

Modal::end();

echo Html::beginTag('div', ['class' => 'preloader']);
echo Html::tag('div', Html::tag('span', '100', ['class' => 'sr-only']), ['class'=>"progress-bar progress-bar-striped active", 'role'=>"progressbar",
    'aria-valuenow'=>"100", 'aria-valuemin'=>"0", 'aria-valuemax'=>"100", 'style'=>"width:100%"]);
echo Html::endTag('div');


$this->registerJs(<<<JS

$(document).on('ready', function() {
    $("#input-1a").fileinput({
    showPreview: false,
    uploadUrl: 'uploads',
    uploadAsync: true,
    uploadExtraData: {
       'gallery_id': "$model->folder_id",
       'gallery_name': "$model->folder_name",
    },
    maxFileCount: 1000,
    allowedFileTypes: ['image'],
    allowedFileExtensions: ['jpg', 'png'],
    messageOptions: {
       'class': 'alert-warning-message'
    },
    elErrorContainer: '#errorBlock'
             
    });
    
    $('#input-1a').on('fileunlock', function(event, data, previewId, index) {
        location.reload();
    });
});
JS
);
?>