<?php
$extensions = get_loaded_extensions();
foreach($extensions as $ext)
{
    echo $ext."<br>";
}
?>