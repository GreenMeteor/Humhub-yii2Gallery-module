<?php

namespace humhub\modules\gallery\models;

/**
 * This is the ActiveQuery class for [[GalleryPermissions]].
 *
 * @see GalleryPermissions
 */
class GalleryPermissionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GalleryPermissions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GalleryPermissions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
