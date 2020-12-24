<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
<script>
function get_extension(filename) {
    return filename.split('.').pop().toLowerCase();
}

$('form').submit(function( e ) {    
    var size = <?php echo parse_size(ini_get('post_max_size')) ;?>;
    if(!($('#user_photo')[0].files[0].size < size && (get_extension($('#user_photo').val()) == 'jpg' || get_extension($('#user_photo').val()) == 'png' || get_extension($('#user_photo').val()) == 'gif'))) { // 10 MB (this size is in bytes)
        document.getElementById("alertWrongExt").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
        e.preventDefault();
    }
    if(!($('#user_photo2')[0].files[0].size < size && (get_extension($('#user_photo2').val()) == 'jpg' || get_extension($('#user_photo2').val()) == 'png' || get_extension($('#user_photo2').val()) == 'gif'))) { // 10 MB (this size is in bytes)
        document.getElementById("alertWrongExt").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
        e.preventDefault();
    }
});

/*function checkFile(env) {
    //var size = <?php echo parse_size(ini_get('post_max_size')) ;?>;
    var size = 2000;
    var filelits = env.target.files;
    var file = filelits[0];
    alert(env);
    if(file.size < size)
    {   
        if(get_extension(file.val()) == 'jpg' || get_extension(file.val()) == 'png' || get_extension(file.val()) == 'gif')
        {
            // ok
        } 
        else 
        {
            <?php
            $alertMessage .= "<li>L'extension d'image n'est pas correcte.</li>";
            ?>
            document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
            file.val() = "";
        }
    } 
    else 
    {
        <?php
        $alertMessage .= "<li>La taille de l'image est trop grande.</li>";
        ?>
        document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
        file.val() = "";
    }
}*/
</script>