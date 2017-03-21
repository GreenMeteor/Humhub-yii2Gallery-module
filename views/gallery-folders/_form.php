<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model humhub\modules\gallery\models\GalleryFolders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-folders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'folder_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'folder_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
