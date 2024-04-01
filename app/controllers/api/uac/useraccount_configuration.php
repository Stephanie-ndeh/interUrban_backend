<?php

namespace app\controllers\api\uac;

use app\controllers\api\_primaries\primaryApi;
use Dotenv\Parser\Value;
use system\core\Session;

class useraccount_configuration extends primaryApi
{
	protected $vUseraccount_configuration;


	public function __construct()
	{
		$this->model('uac/useraccount_configuration_model', true, ['schema_path' => 'uac/']);
		$this->setDb();
		$this->base_model->setDb($this->getDb());
		$this->validation('uac/vUseraccount_configuration');
	}
	/**
	 * 
	 */
	public function get()
	{
		$this->responseJson($this->base_model->get());
	}
	public function getModel(){
		return $this->base_model;
	}
	public function configurationExist()
	{
		$this->responseJson($this->base_model->configuration_exist($_GET));
	}
	public function add()
	{
		if (!$this->base_model->configuration_exist($_GET)) {
			# code...
			$this->genAdd("base_model", "vUseraccount_configuration");
		} else {
			$this->responseJson(null, lang("configuration_exist"));
		}
	}
	public function update()
	{
		if (isset($_POST["user_id"])) {
			// getting id
			$_POST["user_id"] = intval($_POST["user_id"]);

			// fill model object
			$this->base_model->hydrater($_POST);
			// get an existing configuration
			$config = $this->base_model->get(null, $_POST);

			// 
			!empty($config) ? $_POST["config_id"] = $config["CONFIG_ID"] : null;

			$this->base_model->hydrater($_POST);
			if (empty($config)) {
				// 
				$this->genAdd("base_model");
			} else {
				// 
				$this->genUpdate("base_model");
				// $this->responseJson($config);
				$config = $this->base_model->get(null, $_POST);
				if ($this->userRedirect->isConnected()) {
					# code...
					$_SESSION["user"]["config"] = $config;
					$this->responseJson(Session::get("user")["config"]);
				}
			}
		}
	}
	public function delete()
	{
		$this->deleteItems("base_model", "");
	}
}
