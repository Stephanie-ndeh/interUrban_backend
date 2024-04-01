<?php 
namespace app\schemas;
trait buses_model_schema{
	public function buildSchema(){
		$this->table('buses');
		$this->column('id')->type('int(100)')->id();
		$this->column('ag_id')->type('bigint(20)')->foreign('agency');
		$this->column('name')->type('varchar(100)');
		$this->column('type')->type('varchar(100)');
		$this->column('category')->type('int(100)');
		$this->column('no_of_places')->type('bigint(50)');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		$this->column('deleted_at')->type('datetime');
	
	}
}
