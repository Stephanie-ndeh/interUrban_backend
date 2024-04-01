<?php 
namespace app\validations;
use system\core\Validation;
class vBuses extends Validation{
	public function __construct(){
		$this->setRulesGroup('vBuses');
		$this->setRules(
		[
			
			'ag_id' => 'required|bigint|max_length(20)',
			'name' => 'required|varchar|max_length(100)',
			'type' => 'required|varchar|max_length(100)',
			'category' => 'required|int|max_length(100)',
			'no_of_places' => 'required|bigint|max_length(50)',
		
			
			
		]);
	}
}
