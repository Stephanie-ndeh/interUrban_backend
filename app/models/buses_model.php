<?php

namespace app\models;

use system\core\Model;
use app\schemas\buses_model_schema;

class buses_model extends Model
{
	use buses_model_schema;
	public function __construct()
	{
		$this->buildSchema();
	}
	public function get(array $columns = null, $request = null)
	{
		$res = $this->db->select('*')
			->from($this->allTablesString())
			->join($this->foreignColumnLiteral(0), $this->foreignColumnLiteral(0, true));

		!$this->isColumnEmpty('ag_id') ? $res->and($this->foreignColumnLiteral(0), $this->getColumnValue('ag_id')) : null;
		!$this->isColumnEmpty('type') ? $res->and($this->getTable('type'), $this->getColumnValue('type')) : null;
		!$this->isColumnEmpty('category') ? $res->and($this->getTable('category'), $this->getColumnValue('category')) : null;
		!$this->isColumnEmpty('id') ? $res->and($this->getTable('id'), $this->getColumnValue('id')) : null;

		$res->get();

		return !$this->isColumnEmpty('id') ? $res->single() : $res->result();
	}
}
