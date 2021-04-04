<?php

class widgetExemple1
{
    public $name = "widgetExemple1";
    public $property = array();

    public function __construct()
    {
        $exist = executeQuery("SELECT * FROM ".$GLOBALS['GC']['sql_tbl_prefix']."nexus_widgets WHERE nameWidget = ?", array($this->$name));
        if(!isset($exist))
        {
            $this->register();
        }
    }

    public function register()
    {
        executeQuery("INSERT INTO ".$GLOBALS['GC']['sql_tbl_prefix']."nexus_widgets VALUES (NULL,?,?,?,?)", array("Pages","widgetExemple1",serialize($this->$property), false));
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getProperties()
    {
        $getedProp = executeQuery("SELECT properties FROM ".$GLOBALS['GC']['sql_tbl_prefix']."nexus_widgets WHERE nameWidget = ?", array($this->$name));
        $this->property = $getedProp["properties"];
        return $this->property;
    }

    public function display($name)
    {

    }
}
?>