<?php
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>VCM Project</title>
        <?php 
        if($cssIsWeb)
        {
            ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
            <?php
        }
        else
        {
            // Modifier le path du CSS
            ?>
            <link href="styles/tailwindcss.css" rel="stylesheet">
            <?php
        }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/combine/npm/highlightjs@9.16.2/highlight.pack.min.js,npm/axios@0.19.2/dist/axios.min.js,npm/dlv@1.1.3/dist/dlv.umd.min.js,gh/alpinejs/alpine@v2.2.1/dist/alpine.js,npm/fuse.js@5.0.9-beta/dist/fuse.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link rel="stylesheet" href="system/designer/styles/fonts.css"/>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="VCM-Project - CMS">
        <meta name="author" content="Vengelis">    
        <link rel="shortcut icon" href="favicon.ico"> 
        <meta property="og:title" content="VCM-Project - CMS" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://vcm.vlogis-dev.ovh/" />
        <meta property="og:image" content="https://vcm.vlogis-dev.ovh/VCM_Project_Logo.png" />
        <meta property="og:description" content="VCM-Project - Embed en cours de construction. i lsera modifiable via le panel d'administration" />
        <meta name="theme-color" content="#ff5a1f">
    </head>
    <body class="h-screen font-nunito">