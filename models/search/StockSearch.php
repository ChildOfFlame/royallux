<?php
namespace app\models\search;

use Yii;
use app\models\Stock;
use yii\data\ActiveDataProvider;
/**
 * Search model for Stock table
 */
class StockSearch extends Stock{

	public function rules(){
		return [
			[['name'],'safe']
		];
	}

	public function search($params){
		$query = Stock::find();
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if(!($this->load($params) && $this->validate())){
        	return $dataProvider;
        }
        $query->andFilterWhere(['like','name',$this->name]);

        return $dataProvider;
	}
}
