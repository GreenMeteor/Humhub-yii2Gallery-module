<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryPhotos */

$this->title = 'Update Gallery Photos: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->photo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-photos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
