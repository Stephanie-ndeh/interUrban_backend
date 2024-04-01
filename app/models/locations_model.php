<?php 
namespace app\models;
use system\core\Model;
use app\schemas\locations_model_schema;
 class locations_model extends Model{
	use locations_model_schema;
	public function __construct(){
		$this->buildSchema();
	}
}
