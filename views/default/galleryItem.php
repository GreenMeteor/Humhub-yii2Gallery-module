<?php

use humhub\modules\gallery\helpers\Translator;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $model = humhub\modules\gallery\models\GalleryFolders */


?>

<div class="gallery-item">
    <div class="image">
        <?php
            echo Html::beginTag('div', ['class' => 'change-btns']);
            echo Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::toRoute(["delete", 'id'=>$model->folder_id]),
                ['title' => 'Delete',
                    'class' => 'update-btn',
                    'role' => 'modal-toggle',
                    'data-modal-title'=>'Are you sure?',
                    'data-modal-body'=>'This will permanently delete all the pictures are in the gallery.',
                ]);
            echo Html::a('<i class="glyphicon glyphicon-pencil"></i>', Url::toRoute(["update", 'id'=>$model->folder_id]), [
                'title' => 'Update',
                'method' => 'get',
                'class'=>"update-btn",
                'role'=>"modal-toggle",
                'data-modal-title'=>'Update',
            ]);
            echo Html::endTag('div');
        ?>

        <a class="image-wrap" href="<?= Url::toRoute(["view", 'id'=>$model->folder_id]) ?>">
            <?php
            foreach($model->galleryPhotos as $prevPhoto){
                echo \yii\helpers\Html::img('/img/gallery/' . Translator::rus2translit($model->folder_name) . '/thumb/' . $prevPhoto->name);
            };
            ?>
        </a>
    </div>
    <div class="name">
        <span><?= $model->folder_name?></span>

    </div>
</div>
