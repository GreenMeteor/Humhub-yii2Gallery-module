<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryPermissions */

$this->title = 'Update Gallery Permissions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-permissions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
