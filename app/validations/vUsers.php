<?php

namespace app\validations;

use system\core\Validation;

class vUsers extends Validation
{
	public function __construct()
	{
		$this->setRulesGroup('vUsers');
		$this->setRules(
			[
				'name' => 'required|varchar|max_length(100)',
				'email' => 'required|int|max_length(50)',
				'password' => 'required|int|max_length(20)',
				'role' => 'required|varchar|max_length(10)',
				'state' => 'required|tinyint|max_length(1)',
				'email_confirmed' => 'required|tinyint|max_length(1)',
			]
		);
	}
}
