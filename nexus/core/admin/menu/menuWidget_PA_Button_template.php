<?php
function displayPaMenuButton($fc_id, $fc_name, $fc_child, $fc_link = false) {
    ?>

    <a href="#" class="dgbut text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md border-2 border-gray-200 rounded-lg p-2" aria-current="page">
        <input type="text" class="hidden menuButton" name="buttonMenu[]" id="buttonMenu" value="<?php echo $fc_id ;?>"/>
        <div class="grid grid-cols-2 w-full">
            <div><?php echo $fc_name ;?></div>
            <?php if($fc_child) { ?>
                <div class="text-right my-auto">
                    <i onclick="fc_redirect('<?php echo $fc_link ;?>')" class="fas fa-server"></i>
                </div>
            <?php } ?>
        </div>
    </a>

    <?php
}
function displayReturnButton() {
    ?>

    <a href="index.php?app=admin&mod=system&ctl=PA&cmpt=menu_editor" class="text-blue-500 hover:bg-blue-50 hover:text-blue-900 flex items-center px-3 py-2 text-sm font-medium rounded-md border-2 border-blue-200 rounded-lg p-2 mb-5" aria-current="page">
        <span class="w-full">
            <i class="fa fa-long-arrow-alt-left mr-1"></i>
            Retour
        </span>
    </a>

    <?php
}
?>
