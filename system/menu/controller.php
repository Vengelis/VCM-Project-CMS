<?php

class MenuButton {

    private $name = "";
    private $type = "";
    private $parent = "";
    private $app = "";

    /*
     *  Constructeur multiple
     *
     *
    */
    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct0() {

    }

    public function __construct4($name, $type, $parent, $app) {

        $this->name = $name;
        $this->type = $type;
        $this->parent = $parent;
        $this->app = $app;

    }

    public function setType($input) {
        $this->type = $input;
    }
    public function getType() {
        return $this->type;
    }

    public function setName($input) {
        $this->name = $input;
    }
    public function getName() {
        return $this->name;
    }

    public function setParent($input) {
        $this->parent = $input;
    }
    public function getParent() {
        return $this->parent;
    }

    public function setApp($input) {
        $this->app = $input;
    }
    public function getApp() {
        return $this->app;
    }

    public function callConfig($input) {

    }
    public function saveConfig() {

    }

}
