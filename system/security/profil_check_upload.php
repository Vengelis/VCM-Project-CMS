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

</script>