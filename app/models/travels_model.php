<?php 
namespace app\models;
use system\core\Model;
use app\schemas\travels_model_schema;
 class travels_model extends Model{
	use travels_model_schema;
	public function __construct(){
		$this->buildSchema();
	}
	public function get(array $columns = null, $request = null)
	{
		$res = $this->db->select('*')
			->from($this->allTablesString())
			->join($this->foreignColumnLiteral(0), $this->foreignColumnLiteral(0, true))
			->and_join($this->foreignColumnLiteral(1), $this->foreignColumnLiteral(1, true));

		!$this->isColumnEmpty('departure_location_id') ? $res->and($this->foreignColumnLiteral(0), $this->getColumnValue('departure_location_id')) : null;
		!$this->isColumnEmpty('bus_id') ? $res->and($this->foreignColumnLiteral(2), $this->getColumnValue('bus_id')) : null;
		!$this->isColumnEmpty('cost') ? $res->and($this->getTable('cost'), $this->getColumnValue('cost')) : null;
		!$this->isColumnEmpty('arrival_location_id') ? $res->and($this->getTable('arrival_location_id'), $this->getColumnValue('arrival_location_id')) : null;
		!$this->isColumnEmpty('id') ? $res->and($this->getTable('id'), $this->getColumnValue('id')) : null;

		$res->get();

		return !$this->isColumnEmpty('id') ? $res->single() : $res->result();
	}
}
