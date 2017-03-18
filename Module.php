<?php

namespace humhub\modules\gallery;

use humhub\modules\space\models\Space;

/**
 * gallery module definition class
 */
class Module extends \humhub\components\Module
{

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return ('Gallery');
    }

    /**
     * @inheritdoc
     */
    public function getPermissions($contentContainer = null)
    {

        if($contentContainer instanceof Space){
            return [

            ];
        };
        return [];


    }

}
