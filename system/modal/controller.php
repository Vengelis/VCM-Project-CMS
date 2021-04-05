<?php
?>
<script>
function launchModal(name)
{
    if(document.getElementById(name).classList.contains("hidden")) {
        document.getElementById(name).classList.remove('hidden');
    } else {
        document.getElementById(name).classList.add('hidden');
    }
}
</script>
