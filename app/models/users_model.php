<?php

namespace app\models;

use system\core\Model;
use app\schemas\users_model_schema;

class users_model extends Model
{
	use users_model_schema;
	public function __construct()
	{
		$this->buildSchema();
	}
	public function connect()
	{
		return $this->db->select('*')
		->from($this->getTable())
		->where('email',$this->getColumnValue('email'))
		->and('password',$this->getColumnValue('password'))
		->get()
		->single();

	}
	
}
