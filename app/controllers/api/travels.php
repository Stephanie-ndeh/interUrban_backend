<?php 
namespace app\controllers\api;
use app\controllers\api\_primaries\primaryApi;
class travels extends primaryApi{
	protected $travels_model;
	protected $vTravels;
	protected $vTravelsUp;
	 public function __construct(){
		$this->model('travels_model',
		true);
		$this->base_model->setDb($this->getDb());
		$this->validation('vTravels');
		$this->validation('vTravelsUp');
	}
	public function get(){
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get(null,$_GET));
	}
	public function add($boolReturn = false){
		return $this->genAdd('base_model',
		 'vTravels',
		 null,
		 $boolReturn);
	}
	public function update($boolReturn = false){
		return $this->genUpdate('base_model',
		 'vTravelsUp',
		 null,
		 $boolReturn);
	}
	public function delete(){
		$this->deleteItems('base_model');
	}
	
}
