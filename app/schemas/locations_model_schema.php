<?php 
namespace app\schemas;
trait locations_model_schema{
	public function buildSchema(){
		$this->table('locations');
		$this->column('id')->type('int(10)')->id();
		$this->column('name')->type('varchar(100)');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		$this->column('deleted_at')->type('datetime');
	}
}
