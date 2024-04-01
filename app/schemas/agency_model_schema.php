<?php 
namespace app\schemas;
trait agency_model_schema{
	public function buildSchema(){
		$this->table('agency');
		$this->column('ag_id')->type('bigint(20)')->id();
		$this->column('name')->type('varchar(500)');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		$this->column('deleted_at')->type('datetime');
	}
}
