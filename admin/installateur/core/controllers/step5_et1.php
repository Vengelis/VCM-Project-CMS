<?php
require(realpath('./../../temp_global_conf.php'));
//var_dump($INFO);
function build_globalconf()
{
    require(realpath('./../../temp_global_conf.php'));
    $input = '<?php

    $GC = array(
        "sql_host" => \''.$INFO["sql_host"].'\',
        "sql_database" => \''.$INFO["sql_database"].'\',
        "sql_user" => \''.$INFO["sql_user"].'\',
        "sql_pass" => \''.$INFO["sql_pass"].'\',
        "sql_port" => '.$INFO["sql_port"].',
        "sql_tbl_prefix" => \''.$INFO["sql_tbl_prefix"].'\',
        "sql_use_utf8" => \''.$INFO["sql_use_utf8"].'\',
        "root_path" => \''.$INFO["root_path"].'\'
        
    );

?>
        ';
    file_put_contents(realpath('./../../global_conf.php'), $input);
    ?>
    <script>
    document.location.replace("index.php?step=5&etp=1&cps=Base de données");
    </script>
    <?php
    //unlink(realpath($parentDirectory.'temp_global_conf.php'));
}