<?php 
namespace app\models;
use system\core\Model;
use app\schemas\agency_model_schema;
 class agency_model extends Model{
	use agency_model_schema;
	public function __construct(){
		$this->buildSchema();
	}
}
