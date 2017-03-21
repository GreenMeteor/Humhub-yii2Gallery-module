<?php

/* @var $this yii\web\View */

\humhub\modules\gallery\assets\GalleryAsset::register($this);
\humhub\modules\gallery\assets\OnmotionAsset::register($this);
?>

        <div class="gallery-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>


