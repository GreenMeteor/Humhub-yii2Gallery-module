<?php

use yii\db\Migration;
use yii\db\Schema;

class m160406_120743_onmotion_yii2_gallery extends Migration
{
    public function up()
    {
        $this->createTable('{{%gallery_permissions}}', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING,
            ]);

        $this->insert('{{%gallery_permissions}}', ['type' => 'Only Certified Users']);
        $this->insert('{{%gallery_permissions}}', ['type' => 'Only Friends']);
        $this->insert('{{%gallery_permissions}}', ['type' => 'Only Select Users']);

        $this->createTable('{{%gallery_folders}}', [
            'folder_id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'folder_name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'folder_description' => Schema::TYPE_STRING . ' NOT NULL',
            'permission' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey('fk_gallery_user_id', '{{%gallery_folders}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_gallery_permission', '{{%gallery_folders}}', 'permission', '{{%gallery_permissions}}'
            , 'id', 'RESTRICT', 'RESTRICT');

        $this->createTable('{{%gallery_photos}}', [
            'photo_id' => Schema::TYPE_PK,
            'picture_guid' => Schema::TYPE_STRING . ' UNIQUE NOT NULL',
            'folder_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);

        $this->addForeignKey('fk_photos_folder_id', '{{%gallery_photos}}', 'folder_id', '{{%gallery_folders}}', 'folder_id',
            'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_photos_guid', '{{%gallery_photos}}', 'picture_guid', '{{%file}}', 'guid', 'CASCADE', 'CASCADE');

    }

    public function down()
    {

    }

}
