<?php

namespace humhub\modules\gallery\models;

/**
 * This is the ActiveQuery class for [[GalleryPhotos]].
 *
 * @see GalleryPhotos
 */
class GalleryPhotosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GalleryPhotos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryPhotos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
