<?php 
namespace app\schemas;
trait travels_model_schema{
	public function buildSchema(){
		$this->table('travels');
		$this->column('id')->type('int(100)')->id();
		$this->column('travels_date')->type('datetime');
		$this->column('cost')->type('int(100)');
		$this->column('departure_location_id')->type('int(10)')->foreign('locations')->source('id');
		$this->column('arrival_location_id')->type('int(10)');
		$this->column('bus_id')->type('int(10)')->foreign('buses')->source('id');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		$this->column('deleted_at')->type('datetime');
	}
}
