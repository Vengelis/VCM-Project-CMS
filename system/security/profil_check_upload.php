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

document.forms[0].addEventListener('submit', function( evt ) {
    var file1 = document.getElementById('user_photo1').files[0];
    if(file1 && file1.size < <?php echo parse_size(ini_get('post_max_size')) ;?>)
        if(get_extension(file1.val()) == 'jpg' || get_extension(file1.val()) == 'png' || get_extension(file1.val()) == 'gif'){
        } else {
            <?php
            $alertMessage .= "<li>L'extension d'image n'est pas correcte.</li>";
            ?>
            document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
            evt.preventDefault();
        }
    } else {
        <?php
        $alertMessage .= "<li>La taille de l'image est trop grande.</li>";
        ?>
        document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
        evt.preventDefault();
    }

    var file2 = document.getElementById('user_photo2').files[0];

    if(file2 && file2.size < <?php echo parse_size(ini_get('post_max_size')) ;?>)
        if(get_extension(file2.val()) == 'jpg' || get_extension(file2.val()) == 'png' || get_extension(file2.val()) == 'gif'){
        } else {
            <?php
            $alertMessage .= "<li>L'extension d'image n'est pas correcte.</li>";
            ?>
            document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
            evt.preventDefault();
        }        
    } else {
        <?php
        $alertMessage .= "<li>La taille de l'image est trop grande.</li>";
        ?>
        document.getElementById("alertBox").className = "rounded-md bg-red-50 p-4 lg:col-span-12 m-5";
        evt.preventDefault();
    }
}, false);
</script>