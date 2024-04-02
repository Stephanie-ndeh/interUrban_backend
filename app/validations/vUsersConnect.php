<?php

namespace app\validations;

use Exception;
use system\core\Validation;

class vUsersConnect extends Validation
{
	public function __construct()
	{
		$this->setRulesGroup('vUsersConnect');
		$this->setRules(
			[

				'email' => 'required|varchar|max_length(50)',
				'password' => function(){
					if ($_POST['password'] || !empty($_POST['password'])) {
						# code...
						$_POST['password'] = md5($_POST['password']);
					}else{
                        throw new Exception("unset password", 1);
                        
                    }
				},
			]
		);
	}
}
