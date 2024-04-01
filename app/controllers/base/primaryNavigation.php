<?php

namespace app\controllers\base;

use system\core\Controller;

class primaryNavigation extends Controller
{
    protected $userRedirect;
    protected $folder;
    protected $id;
    protected $key;
    public function __construct()
    {
        $this->library("userRedirect");
        $this->lang('errors');
        $this->lang('lang');
        $this->lang('labels');
        $this->lang('months');
        $this->lang('countries');
        $this->lang('countriesWithDial');
        $this->lang('messages');
        $this->lang('menu');
    }
    public function index($data = null)
    {
        $this->view("navigation/" . $this->folder . "/" . $this->key . "s", $data);
    }
    protected function template($page, $title = null, $datas = null)
    {
        $this->view('pageParts/head', ["title" => $title]);
        $this->view($page, $datas);
        $this->view('pageParts/foot');
    }
    protected function loggedTemplate($page, $title = null, $datas = null)
    {
        $this->view('pageParts/head', ["title" => $title]);
        $this->view($page, $datas);
        $this->view('pageParts/foot');
    }
    public function form($id = null, $view, $key, $datas = [])
    {
        $tmp_datas = $this->getDatasFromId();
        $datas[$this->key] = $tmp_datas[$this->key] ?? null;
        // 
        $formHeadDatas = ["target" => $key, "id" => $this->id];
        $formFootDatas = [];
        if (!empty($tmp_datas)) {
            # code...
            $formHeadDatas["datas"] = $datas[$this->key];
            $formFootDatas["datas"] = "";
        }


        $this->view("pageParts/sections/forms/commons/formHeader", $formHeadDatas);
        $this->view("pageParts/sections/forms/" . $view, $datas);
        $this->view("pageParts/sections/forms/commons/formButtons", $formFootDatas ?? []);
    }
    protected function getDatasFromId()
    {
        $ret = [];
        if (isset($_GET[$this->id])) {
            // $_GET['id'] = $_GET[$id];
            $this->base_model->hydrater($_GET);
            $res = $this->base_model->get(null, $_GET);
            // 
            if (!empty($res)) {
                # code...
                $ret[$this->key] = $res;
            }
        }
        return $ret;
    }
    public function getForm($data = null)
    {
        $this->form($this->id, $this->folder . "/add", $this->key, $data);
    }
    public function consult($datas = [])
    {
        $this->getDatasFromId($datas);
        $this->view("navigation/" . $this->folder . "/" . $this->key . "Details", $datas);
    }
}
