<?php 
namespace app\controllers\api;
use app\controllers\api\_primaries\primaryApi;
class locations extends primaryApi{
	protected $locations_model;
	protected $vLocations;
	protected $vLocationsUp;
	 public function __construct(){
		$this->model('locations_model',
		true);
		$this->base_model->setDb($this->getDb());
		$this->validation('vLocations');
		$this->validation('vLocationsUp');
	}
	public function get(){
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get());
	}
	public function add($boolReturn = false){
		return $this->genAdd('base_model',
		 'vLocations',
		 null,
		 $boolReturn);
	}
	public function update($boolReturn = false){
		return $this->genUpdate('base_model',
		 'vLocationsUp',
		 null,
		 $boolReturn);
	}
	public function delete(){
		return $this->deleteItems('base_model');
	}
}
