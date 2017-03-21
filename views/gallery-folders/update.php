<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryFolders */

$this->title = 'Update Gallery Folders: ' . $model->folder_id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Folders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->folder_id, 'url' => ['view', 'id' => $model->folder_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-folders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
