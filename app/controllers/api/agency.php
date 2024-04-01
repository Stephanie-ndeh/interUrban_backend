<?php

namespace app\controllers\api;

use app\controllers\api\_primaries\primaryApi;

class agency extends primaryApi
{
	protected $agency_model;
	protected $vAgency;
	protected $vAgencyUp;
	public function __construct()
	{
		$this->model(
			'agency_model',
			true
		);
		$this->base_model->setDb($this->getDb());
		$this->validation('vAgency');
		$this->validation('vAgencyUp');
	}
	public function get()
	{
		$this->base_model->hydrater($_GET);
		$this->responseJson($this->base_model->get());
	}
	public function add($boolReturn = false)
	{
		return $this->genAdd(
			'base_model',
			'vAgency',
			null,
			$boolReturn
		);
	}
	public function update($boolReturn = false)
	{
		return $this->genUpdate(
			'base_model',
			'vAgencyUp',
			null,
			$boolReturn
		);
	}
	public function delete()
	{
		return $this->deleteItems('base_model');
	}
}
