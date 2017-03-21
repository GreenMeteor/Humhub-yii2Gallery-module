<?php
use humhub\modules\gallery\models\GalleryPermissions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'folder_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'folder_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission')->dropDownList(
            ArrayHelper::map(GalleryPermissions::find()->all(), 'id', 'type'),
        ['prompt' => 'Select Folder Permission']
    )?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Edit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
