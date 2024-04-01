<?php

namespace app\controllers\api\uac;

use app\controllers\api\_primaries\primaryApi;
use system\core\Session;
use app\controllers\api\uac\useraccount_role;
use system\Loader;

Loader::load("app/controllers/api/uac/useraccount_role.php");
Loader::load("app/controllers/api/uac/useraccount_configuration.php");

/**
 * [Description useraccount]
 */
class useraccount extends primaryApi
{

	// members
	protected $useraccount_configuration;
	protected $useraccount_role;

	// validations
	protected $vUseraccount;
	protected $vUseraccount_password;
	protected $vConnect;
	protected $vSet_password;



	public function __construct()
	{
		parent::__construct();
		// lang
		$this->lang("messages");

		// models
		// 
		$this->setDb();
		// setting databases to models
		$this->useraccount_model->setDb($this->db);
		// validations
		$this->validation('uac/vUseraccount');
		$this->validation('uac/vSet_password');
		$this->validation('uac/vConnect');
		$this->validation('uac/vUseraccount_password');

		$this->useraccount_role = new useraccount_role();
		$this->useraccount_configuration = new useraccount_configuration();
	}
	/**
	 * @return [type]
	 */
	public function get()
	{
		$this->useraccount_model->hydrater($_GET);
		$this->responseJson($this->useraccount_model->get(null, $_GET));
	}
	/**
	 * @return [type]
	 */
	public function add($boolean_return = null)
	{
		if ($this->vUseraccount->run()) {

			$this->useraccount_model->hydrater($_POST);

			if (!$this->emailExist()) {
				if (!$this->phoneNumberExist()) {

					$_POST["password"] = md5($_POST["password"]);
					$_POST["api_token"] = getRandomStringUniqid(60);

					$this->useraccount_model->hydrater($_POST);

					if ($this->useraccount_model->add()) {
						$_POST["user_id"] = $this->getDb()->lastInsertId();
						return $this->useraccount_role->addMany();
					} else {
						$this->responseJson(null, "");
					}
				} else {
					return $boolean_return ? ["status" => false, "message" => lang("item_exist", ["item" => lang("phone_number")])] : $this->responseJson(null, lang("item_exist", ["item" => lang("phone_number")]));
				}
			} else {
				// email exist already
				return $boolean_return ? ["status" => false, "message" => lang("email_exist")] : $this->responseJson(null, lang("email_exist"));
			}
		} else {
			return  $boolean_return ? ["status" => false, "message" => getErrors(null,true)] : $this->responseJson(null, getErrors(null, true));
		}
	}
	private function emailExist()
	{
		return empty($this->useraccount_model->getFromEmail()) ? false : true;
	}
	private function phoneNumberExist()
	{
		return empty($this->useraccount_model->getFromPhoneNumber()) ? false : true;
	}
	public function disconnect()
	{
		Session::destroy();
	}


	/**
	 * @return [type]
	 */
	public function update()
	{
		$this->genUpdate("useraccount_model");
	}
	public function changePassword()
	{

		if ($this->vUseraccount_password->run()) {
			$this->useraccount_model->hydrater($_POST);
			$this->useraccount_model->hydrater(["user_id" => $_POST["id"]]);
			// var_dump($this->useraccount_model->get(null, $_GET));
			$user = $this->useraccount_model->get(null, $_GET);
			if (!empty($user)) {
				if ($user["PASSWORD"] == md5($_POST["old_password"])) {
					if ($user["PASSWORD"] != md5($_POST["password"])) {
						// update
						$_POST["password"] = md5($_POST["password"]);
						$this->userRedirect->isConnected() ? Session::get("user")["profile"]["PASSWORD"] = $_POST["password"] : '';
						$this->genUpdate("useraccount_model", null, lang("pass_changed"));
						// $this->responseJson(null, lang("pass_changed"));
					} else {
						// the given new password is the old
						$this->responseJson(null, lang("pass_unchanged"));
					}
				} else {
					// error old password doesn't match current
					$this->responseJson(null, lang("old_password_error"));
				}
			} else {
				// error
			}
		} else {
			$this->responseJson(null, lang("fields_empty"));
		}
	}

	/**
	 * @return [type]
	 */
	public function connect()
	{
		if ($this->vConnect->run()) {
			# code...
			$_POST["password"] = md5($_POST["password"]);
			$this->useraccount_model->hydrater($_POST);
			$profile = $this->useraccount_model->connect();
			if (empty($profile)) {
				# code...
				$this->responseJson(null, lang("connection_error"));
			} else {
				// get session informations
				// 
				$urlToRedirect = $this->connectInSession($profile);
				$this->responseJson([], lang("login_done"), url($urlToRedirect));
				return;
			}
		} else {
			$this->responseJson(null, lang("fields_empty"));
		}
	}
	private function connectInSession($profile = null)
	{
		$this->useraccount_role->getModel()->hydrater(["USER_ID" => $profile["USER_ID"]]);
		// 
		$urlToRedirect = getConfig("loggedURl");
		$roles = $this->useraccount_role->getModel()->getUserRoles();
		$config = $this->useraccount_configuration->getModel()->get(null, ["user_id" => $profile["USER_ID"]]);
		// 
		$session_datas = ["profile" => $profile, "roles" => $roles];
		!empty($config) ? $session_datas["config"] = $config : null;
		// 
		Session::set("user", $session_datas);
		return $urlToRedirect;
	}
	/**
	 * @return [type]
	 */
	public function logout()
	{
		Session::destroy();
		$this->responseJson(null, lang("logout_successfull"), "");
	}
	public function register()
	{
		// $this->responseJson($_POST);
		if ($this->vUseraccount->run()) {
			// 
			$this->useraccount_model->hydrater($_POST);
			// var_dump($this->emailExist());
			// echo $this->useraccount_model->getColumnValue("EMAIL_ADDRESS");
			if (!$this->emailExist()) {
				if (!$this->phoneNumberExist()) {
					# code...
					$_POST["api_token"] = getRandomStringUniqid(60);
					$_POST["password"] = md5($_POST["password"]);
					$_POST["state"] = 1;
					// 
					$this->useraccount_model->hydrater($_POST);
					$this->useraccount_model->add();
					// 
					$userId = $this->getDb()->lastInsertId();
					// 
					$useraccount_role_datas = [
						"role_id" => isset($_POST["teacher"]) ? 2 : 1,
						"user_id" => $userId,
					];

					$this->useraccount_role->getModel()->hydrater($useraccount_role_datas);
					$this->useraccount_role->add();
					// 

					// $_POST["USER_ID"] = $userId;
					$this->useraccount_model->hydrater(["user_id" => $userId]);
					$profile = $this->useraccount_model->get(null, ["id" => $userId]);
					// $this->responseJson($profile);
					$urlToRedirect = $this->connectInSession($profile);
					$this->responseJson([], "register done", url($urlToRedirect));

					// $this->;
				} else {
					$this->responseJson(null, lang("item_exist", ["item" => lang("phone_number")]));
				}
			} else {
				$this->responseJson(null, lang("email_exist"));
			}
		} else {
			$this->responseJson(null, lang("fields_empty"));
		}
	}
	public function modifyPassword()
	{
	}
	/**
	 * @return [type]
	 */
	public function delete()
	{
		$this->deleteItems("useraccount_model", "");
	}
}
