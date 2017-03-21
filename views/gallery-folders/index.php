<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel humhub\modules\gallery\models\GalleryFoldersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery Folders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-folders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gallery Folders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'folder_id',
            'user_id',
            'folder_name',
            'folder_description',
            'permission',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
