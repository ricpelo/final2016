<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InmueblesSearch represents the model behind the search form of `app\models\Inmuebles`.
 */
class InmueblesSearch extends Inmuebles
{
    public $precioDesde;
    public $precioHasta;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'habitaciones', 'banos', 'propietario_id'], 'integer'],
            [['precio', 'precioDesde', 'precioHasta'], 'number'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'precioDesde',
            'precioHasta',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inmuebles::find();

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
            // 'habitaciones' => $this->habitaciones,
            // 'banos' => $this->banos,
            'lavavajillas' => $this->lavavajillas,
            'garaje' => $this->garaje,
            'trastero' => $this->trastero,
            'propietario_id' => $this->propietario_id,
        ]);

        $query->andFilterWhere(['>=', 'habitaciones', $this->habitaciones])
            ->andFilterWhere(['>=', 'banos', $this->banos])
            ->andFilterWhere(['>=', 'precio', $this->precioDesde])
            ->andFilterWhere(['<=', 'precio', $this->precioHasta]);

        return $dataProvider;
    }
}
