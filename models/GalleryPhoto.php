<?php

namespace humhub\modules\gallery\models;

/**
 * This is the model class for table "g_photo".
 *
 * @property string $photo_id
 * @property string $gallery_id
 * @property mixed $gallery
 * @property string $name
 */
class GalleryPhoto extends \yii\db\ActiveRecord
{
    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'g_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id'], 'integer'],
            [['name'], 'string', 'max' => 250],
            [['files'], 'file', 'maxFiles' => 100, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo_id' => 'ID',
            'gallery_id' => 'Gallery_ID',
            'name' => 'Name',
        ];
    }

    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['gallery_id' => 'gallery_id']);
    }
}
