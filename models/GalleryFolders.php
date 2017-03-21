<?php

namespace humhub\modules\gallery\models;

use humhub\modules\user\components\User;

/**
 * This is the model class for table "gallery_folders".
 *
 * @property integer $folder_id
 * @property integer $user_id
 * @property string $folder_name
 * @property string $folder_description
 * @property integer $permission
 *
 * @property GalleryPermissions $permission0
 * @property User $user
 * @property GalleryPhotos[] $galleryPhotos
 */
class GalleryFolders extends \humhub\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_folders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folder_name', 'folder_description', 'permission'], 'required'],
            [['user_id', 'permission'], 'integer'],
            [['folder_name', 'folder_description'], 'string', 'max' => 255],
            [['permission'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryPermissions::className(), 'targetAttribute' => ['permission' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'folder_id' => 'Folder ID',
            'user_id' => 'User ID',
            'folder_name' => 'Folder Name',
            'folder_description' => 'Folder Description',
            'permission' => 'Permission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(GalleryPermissions::className(), ['id' => 'permission']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryPhotos()
    {
        return $this->hasMany(GalleryPhotos::className(), ['folder_id' => 'folder_id']);
    }

    /**
     * @inheritdoc
     * @return GalleryFoldersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryFoldersQuery(get_called_class());
    }
}
