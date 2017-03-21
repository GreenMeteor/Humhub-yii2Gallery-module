<?php

namespace humhub\modules\gallery\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GalleryFoldersSearch represents the model behind the search form about `humhub\modules\gallery\models\GalleryFolders`.
 */
class GalleryFoldersSearch extends GalleryFolders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folder_id', 'user_id', 'permission'], 'integer'],
            [['folder_name', 'folder_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GalleryFolders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'folder_id' => $this->folder_id,
            'user_id' => $this->user_id,
            'permission' => $this->permission,
        ]);

        $query->andFilterWhere(['like', 'folder_name', $this->folder_name])
            ->andFilterWhere(['like', 'folder_description', $this->folder_description]);

        return $dataProvider;
    }
}
