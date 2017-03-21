<?php

namespace humhub\modules\gallery\models;

/**
 * This is the ActiveQuery class for [[GalleryFolders]].
 *
 * @see GalleryFolders
 */
class GalleryFoldersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GalleryFolders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryFolders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
