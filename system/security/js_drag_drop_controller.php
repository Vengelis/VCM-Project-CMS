<?php 
 
 /**
 * @ Project: VCM Project CMS 

 * @ Author: Vengelis (Gabriel T.) 

 * @ Create Time: 2021-01-17 15:01:11
 * @ Modified by: Vengelis (Gabriel T.)
 * @ Modified time: 2021-01-19 22:41:47 
 * @ github: https://github.com/Vengelis/VCM-Project-CMS/tree/master
 */


if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>

<script>
function formatSizeUnits(bytes){
  if      (bytes >= 1073741824) { bytes = (bytes / 1073741824).toFixed(2) + " GB"; }
  else if (bytes >= 1048576)    { bytes = (bytes / 1048576).toFixed(2) + " MB"; }
  else if (bytes >= 1024)       { bytes = (bytes / 1024).toFixed(2) + " KB"; }
  else if (bytes > 1)           { bytes = bytes + " bytes"; }
  else if (bytes == 1)          { bytes = bytes + " byte"; }
  else                          { bytes = "0 bytes"; }
  return bytes;
}
function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
var fileobj;
function deleteFile() {
    var imageParent = document.getElementById("image");
    image.src = ""; 
    document.getElementById("iconeUpdated").value = "true";
    document.getElementById("haveIcone").value = "NULL";
    document.getElementById("size").innerHTML = "0 KB";
    document.getElementById("fileName").innerHTML = "Aucune image attachée";
}
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
    sleep(500);
    var imageParent = document.getElementById("image");
    image.src = "system/medias/images/temp/"+e.dataTransfer.files[0].name;
    document.getElementById("iconeUpdated").value = "true";
    document.getElementById("haveIcone").value = e.dataTransfer.files[0].name;
    document.getElementById("size").innerHTML = formatSizeUnits(e.dataTransfer.files[0].size);
    document.getElementById("fileName").innerHTML = e.dataTransfer.files[0].name;
}
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
        sleep(500);
        var imageParent = document.getElementById("image");
        image.src = "system/medias/images/temp/"+fileobj.name;
        document.getElementById("iconeUpdated").value = "true";
        document.getElementById("haveIcone").value = fileobj.name;
        document.getElementById("size").innerHTML = formatSizeUnits(fileobj.size);
        document.getElementById("fileName").innerHTML = fileobj.name;
    };
}
function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        $.ajax({
            type: 'POST',
            url: '#',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                $('#selectfile').val('');
            }
            
        });
    }
}
</script>