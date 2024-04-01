<?php

namespace app\validations;

use system\core\Validation;

class vUsersUp extends Validation
{
	public function __construct()
	{
		$this->setRulesGroup('vUsersUp');
		$this->setRules(
			[
				'id' => 'required|varchar|max_length(100)',
				'name' => 'varchar|max_length(100)',
				'email' => 'int|max_length(50)',
				'role' => 'varchar|max_length(10)',
				'state' => 'tinyint|max_length(1)',
				'email_confirmed' => 'tinyint|max_length(1)',
			]
		);
	}
}
