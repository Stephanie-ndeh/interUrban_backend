<?php 
namespace app\validations;
use system\core\Validation;
class vReservations extends Validation{
	public function __construct(){
		$this->setRulesGroup('vReservations');
		$this->setRules(
		[
			'reservation_date' => 'required|datetime',
			'state' => 'required|varchar|max_length(100)',
			'user_id' => 'required|int|max_length(10)',
			'travels_id' => 'required|int|max_length(10)',
			
			
		]);
	}
}
