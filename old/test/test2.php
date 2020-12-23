<?php

$input = '<?php

$INFO = array(
    "sql_host" => "'.$_GET["host"].'",
    "sql_database" => "'.$_GET["name"].'",
    "sql_user" => "'.$_GET["user"].'",
    "sql_pass" => "'.$_GET["pass"].'",
    "sql_port" => '.$_GET["port"].',
    "sql_tbl_prefix" => "'.$_GET["prefix"].'"
);

?>
';

/* and finally, put the contents */
file_put_contents("test3.php", $input);
?>