<?php 
namespace app\schemas;
trait users_model_schema{
	public function buildSchema(){
		$this->table('users');
		$this->column('id')->type('int(10)')->id();
		$this->column('name')->type('varchar(100)');
		$this->column('email')->type('int(50)');
		$this->column('password')->type('int(20)');
		$this->column('role')->type('varchar(10)');
		$this->column('state')->type('tinyint(1)');
		$this->column('email_confirmed')->type('tinyint(1)');
		$this->column('created_at')->type('datetime');
		$this->column('updated_at')->type('datetime');
		$this->column('deleted_at')->type('datetime');

	}
}
