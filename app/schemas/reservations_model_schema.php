<?php 
namespace app\schemas;
trait reservations_model_schema{
	public function buildSchema(){
		$this->table('reservations');
		$this->column('id')->type('int(11)')->id();
		$this->column('reservation_date')->type('datetime');
		$this->column('state')->type('varchar(100)');
		$this->column('user_id')->type('int(10)')->foreign('users')->source('id');
		$this->column('travels_id')->type('int(10)')->foreign('travels')->source('id');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		
	}
}
