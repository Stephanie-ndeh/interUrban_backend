<?php 
namespace app\validations;
use system\core\Validation;
class vLocations extends Validation{
	public function __construct(){
		$this->setRulesGroup('vLocations');
		$this->setRules(
		[
			'name' => 'required|varchar|max_length(100)',
			
			
		]);
	}
}
