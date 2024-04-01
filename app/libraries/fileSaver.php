<?php

namespace app\libraries;

class fileSaver
{
    public $baseFolder = "assets/upload/";
    public $folder = "";
    public $itemFolder = "";
    public $name = "";
    public $fileName = "";
    public function __construct()
    {
    }
    public function save()
    {
        if (!is_dir($this->baseFolder . $this->folder)) {
            # code...
            mkdir($this->baseFolder . $this->folder);
        }
        if (!is_dir($this->baseFolder . $this->folder . "/" . $this->itemFolder)) {
            # code...
            mkdir($this->baseFolder . $this->folder . "/" . $this->itemFolder);
        }
        if (is_array($_FILES[$this->name]["tmp_name"])) {
            # code...
            foreach ($_FILES[$this->name]["tmp_name"] as $key => $tmp_name) {
                // var_dump($tmp_name);
                move_uploaded_file($tmp_name, $this->path($key));
            }
        } else {
            move_uploaded_file($_FILES[$this->name]["tmp_name"], $this->path());
        }
    }
    public function path($index = null)
    {
        return $this->baseFolder . $this->folder . "/" . $this->itemFolder . "/" . $this->fileName . ($index ?? "") . "." . (isset($index) ? explode("/", $_FILES[$this->name]["type"][$index]) : explode("/", $_FILES[$this->name]["type"]))[1];
    }
}
