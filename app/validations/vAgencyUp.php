<?php 
namespace app\validations;
use system\core\Validation;
class vAgencyUp extends Validation{
	public function __construct(){
		$this->setRulesGroup('vAgencyUp');
		$this->setRules(
		[
            'ag_id' => 'required|varchar|max_length(100)',
			'name' => 'varchar|max_length(500)'
		
			
		]);
	}
}
