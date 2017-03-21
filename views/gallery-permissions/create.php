<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryPermissions */

$this->title = 'Create Gallery Permissions';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-permissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
