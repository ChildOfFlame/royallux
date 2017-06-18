<?php

namespace app\commands;

use yii\console\Controller;
use app\models\Stock;

class ImportController extends Controller{

	public $nameFile;
	public $path;
	public $arData;

	public function actionInit($nameFile="import.csv",$path="/web/"){
		$this->nameFile=$nameFile;
		$this->path=dirname(__DIR__).$path;
		$this->arData=$this->readCSV();
		$this->addInTable($this->arData);
	}

	private function readCSV(){
		$file = fopen($this->path . $this->nameFile, "r");
		$type_name;
		$arData=[];
		while ($row=fgetcsv($file)){
			if($type=$this->isType($row)){
				$type_name=$type;
				continue;
			}
			if(!empty($row[0])){
			$arData[]=array("name"=>$row[0],"price"=>$row[1],"count"=>$row[2],"type"=>$type_name);
			}
		}
		if(!empty($arData)){
			return $arData;
		}
		else{
			return false;
		}
	}
	private function isType($row){
		if(strpos($row[0],"(type)")!==false)
			return substr($row[0], 0,strpos($row[0],"(type)"));	
		else
			return false;
	}
	private function addInTable($arData){
		foreach ($arData as $key => $value) {
			$stock= new Stock();
			$stock->attributes=$value;
			$stock->save();
		}
	}
}