<?php 
namespace app\controllers\api;
use app\controllers\api\_primaries\primaryApi;
class reservations extends primaryApi{
	protected $reservations_model;
	protected $vReservations;
	protected $vReservationsUp;
	 public function __construct(){
		$this->model('reservations_model',
		true);
		$this->base_model->setDb($this->getDb());
		$this->validation('vReservations');
		$this->validation('vReservationsUp');
	}
	public function get(){
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get(null,$_GET));
	}
	public function add($boolReturn = false){
		return $this->genAdd('base_model',
		 'vReservations',
		 null,
		 $boolReturn);
	}
	public function update($boolReturn = false){
		return $this->genUpdate('base_model',
		 'vReservationsUp',
		 null,
		 $boolReturn);
	}
	public function delete(){
		return $this->deleteItems('base_model');
	}
}
