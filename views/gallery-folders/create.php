<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryFolders */

$this->title = 'Create Gallery Folders';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Folders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-folders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
