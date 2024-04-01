<?php 
namespace app\validations;
use system\core\Validation;
class vLocationsUp extends Validation{
	public function __construct(){
		$this->setRulesGroup('vLocationsUp');
		$this->setRules(
		[
            'id' => 'required|varchar|max_length(100)',
			'name' => 'required|varchar|max_length(100)',
			
			
		]);
	}
}
