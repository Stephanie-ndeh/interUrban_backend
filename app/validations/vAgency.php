<?php 
namespace app\validations;
use system\core\Validation;
class vAgency extends Validation{
	public function __construct(){
		$this->setRulesGroup('vAgency');
		$this->setRules(
		[
			'name' => 'required|varchar|max_length(500)'
		
			
		]);
	}
}
