<?php

namespace app\models;

use system\core\Model;
use app\schemas\reservations_model_schema;

class reservations_model extends Model
{
	use reservations_model_schema;
	public function __construct()
	{
		$this->buildSchema();
	}
	public function get(array $columns = null, $request = null)
	{
		$res = $this->db->select('*')
			->from($this->allTablesString())
			->join($this->foreignColumnLiteral(0), $this->foreignColumnLiteral(0, true))
			->and_join($this->foreignColumnLiteral(1), $this->foreignColumnLiteral(1, true));

		!$this->isColumnEmpty('user_id') ? $res->and($this->foreignColumnLiteral(0), $this->getColumnValue('user_id')) : null;
		!$this->isColumnEmpty('travels_id') ? $res->and($this->foreignColumnLiteral(1), $this->getColumnValue('travels_id')) : null;
		!$this->isColumnEmpty('state') ? $res->and($this->getTable('state'), $this->getColumnValue('state')) : null;
		!$this->isColumnEmpty('id') ? $res->and($this->getTable('id'), $this->getColumnValue('id')) : null;

		$res->get();

		return !$this->isColumnEmpty('id') ? $res->single() : $res->result();
	}
	
}
