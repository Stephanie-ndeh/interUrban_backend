<?php 
namespace app\controllers\api;
use app\controllers\api\_primaries\primaryApi;
class buses extends primaryApi{
	protected $buses_model;
	protected $vBuses;
	protected $vBusesUp;
	 public function __construct(){
		$this->model('buses_model',
		true);
		$this->base_model->setDb($this->getDb());
		$this->validation('vBuses');
		$this->validation('vBusesUp');
	}
	public function get(){
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get(null,$_GET));
	}
	public function add($boolReturn = false){
		return $this->genAdd('base_model',
		 'vBuses',
		 null,
		 $boolReturn);
	}
	public function update($boolReturn = false){
		return $this->genUpdate('base_model',
		 'vBusesUp',
		 null,
		 $boolReturn);
	}
	public function delete(){
		return $this->deleteItems('base_model');
	}
}
