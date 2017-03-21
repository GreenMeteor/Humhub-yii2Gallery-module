<?php

namespace humhub\modules\gallery\models;

/**
 * This is the model class for table "gallery_permissions".
 *
 * @property integer $id
 * @property string $type
 *
 * @property GalleryFolders[] $galleryFolders
 */
class GalleryPermissions extends \humhub\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryFolders()
    {
        return $this->hasMany(GalleryFolders::className(), ['permission' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GalleryPermissionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryPermissionsQuery(get_called_class());
    }
}
