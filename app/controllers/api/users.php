<?php

namespace app\controllers\api;

use app\controllers\api\_primaries\primaryApi;

class users extends primaryApi
{
	protected $users_model;
	protected $vUsers;
	protected $vUsersUp;
	protected $vUsersConnect;
	public function __construct()
	{
		$this->model(
			'users_model',
			true
		);
		$this->base_model->setDb($this->getDb());
		$this->validation('vUsers');
		$this->validation('vUsersUp');
		$this->validation('vUsersConnect');
	}
	public function get()
	{
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get());
	}
	public function add($boolReturn = false)
	{
		if (isset($_POST['password'])) {
			$_POST['password'] = md5($_POST['password']);
		}
		return $this->genAdd(
			'base_model',
			'vUsers',
			null,
			$boolReturn
		);
	}
	public function update($boolReturn = false)
	{
		return $this->genUpdate(
			'base_model',
			'vUsersUp',
			null,
			$boolReturn
		);
	}
	public function delete()
	{
		return $this->deleteItems('base_model');
	}
	public function connect()
	{
		if ($this->vUsersConnect->run()) {
			# code...
			$this->base_model->hydrater($_POST);
			$userInfos = $this->base_model->connect();
			if (empty($userInfos)) {
				# code...
				return $this->responseJson([],'wrong username or password');
			}
			return $this->responseJson($this->base_model->connect());
		}
		return $this->responseJson([],getErrors(null,true));

	}
}
