<?php 
namespace app\validations;
use system\core\Validation;
class vTravels extends Validation{
	public function __construct(){
		$this->setRulesGroup('vTravels');
		$this->setRules(
		[
			'travels_date' => 'required|datetime',
			'cost' => 'required|int|max_length(100)',
			'departure_location_id' => 'required|int|max_length(10)',
			'arrival_location_id' => 'required|int|max_length(10)',
			'bus_id' => 'required|int|max_length(10)',
			
		]);
	}
}
