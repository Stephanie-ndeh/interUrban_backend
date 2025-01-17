<?php

namespace app\controllers\api\uac;

use app\controllers\api\_primaries\primaryApi;

class useraccount_role extends primaryApi
{
	protected $vUseraccount_role;
	public function __construct()
	{

		$this->model('uac/useraccount_role_model', true, ['schema_path' => 'uac/']);
		$this->setDb();
		// var_dump($this->base_model);
		$this->base_model->setDb($this->getDb());
		$this->validation('uac/vUseraccount_role');
	}
	public function getModel()
	{
		return $this->base_model;
	}
	public function get()
	{
		$this->responseJson($this->base_model->get());
	}
	public function add($boolean_return = null)
	{
		return $this->genAdd("base_model", "vUseraccount_role", null, $boolean_return);
	}
	public function addMany()
	{
		$addState = true;
		if (isset($_POST["role_id"])) {
			$roleIds = [];

			switch (true) {
				case is_string($_POST["role_id"]):
					$roleIds = explode(",", $_POST["role_id"]);
					break;
				case is_array($_POST["role_id"]):
					$roleIds = $_POST["role_id"];
					break;
				default:
					return $this->add(true);
					break;
			}
			foreach ($roleIds as $id) {
				$_POST["role_id"] = $id;
				if ($this->add()) {
				} else {
					return false;
				}
			}
			// var_dump($this->add());
		}
		return $addState;
	}
	public function getRoleUsers()
	{
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->getRoleUsers());
	}
	public function getUserRoles()
	{
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->getUserRoles());
	}
	public function removeUserRole()
	{
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->removeUserRole());
	}
}
