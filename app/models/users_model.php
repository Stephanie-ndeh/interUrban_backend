<?php 
namespace app\models;
use system\core\Model;
use app\schemas\users_model_schema;
 class users_model extends Model{
	use users_model_schema;
	public function __construct(){
		$this->buildSchema();
	}
}
