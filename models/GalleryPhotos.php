<?php

namespace humhub\modules\gallery\models;

use humhub\modules\file\models\File;

/**
 * This is the model class for table "gallery_photos".
 *
 * @property integer $photo_id
 * @property string $picture_guid
 * @property integer $folder_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property GalleryFolders $folder
 * @property File $pictureGu
 */
class GalleryPhotos extends \humhub\components\ActiveRecord
{
    public $picture;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture_guid', 'folder_id', 'title', 'created_at'], 'required'],
            [['folder_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['picture_guid', 'title'], 'string', 'max' => 255],
            [['picture_guid'], 'unique'],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryFolders::className(), 'targetAttribute' => ['folder_id' => 'folder_id']],
            [['picture_guid'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['picture_guid' => 'guid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo_id' => 'Photo ID',
            'picture_guid' => 'Picture Guid',
            'folder_id' => 'Folder ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFolder()
    {
        return $this->hasOne(GalleryFolders::className(), ['folder_id' => 'folder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictureGu()
    {
        return $this->hasOne(File::className(), ['guid' => 'picture_guid']);
    }

    /**
     * @inheritdoc
     * @return GalleryPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryPhotosQuery(get_called_class());
    }
}
