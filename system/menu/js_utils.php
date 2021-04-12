<?php
?>
<script>

    // Drag and drop buttons

    const dragArea = document.querySelector(".menuDragDrop");
    var id = document.getElementById("parentID").value;

    const fills = document.querySelectorAll('.dgbut');

    for (const fill of fills) {
        fill.addEventListener('dragend', dragEnd);
    }
    function dragEnd() {
        actualiseMenu(id);
    }

    new Sortable(dragArea, {
        animation: 350
    });

    function fc_redirect(link) {
        document.location.replace(link);
    }

    // Params fonctions

    function hideAllParams() {
        var elements = document.getElementsByClassName("menuParam");
        for (var i = 0; i < elements.length; i++) {
            if(!elements[i].classList.contains("hidden")) {
                elements[i].classList.add("hidden");
            }
        }
        var elements = document.getElementsByClassName("dgbut");
        for (var i = 0; i < elements.length; i++) {
            if(!elements[i].classList.contains("hidden")) {
                elements[i].classList.add("hidden");
            }
        }
    }

    function showParam(id) {
        hideAllParams();
        document.getElementById("menuButtonParam_"+id).classList.remove("hidden");
    }

    // Actualise bdd menu

    function actualiseMenu(id) {

        var elements = document.getElementsByClassName("menuButton");

        var button = [];

        for (var i = 0; i < elements.length; i++) {
            button.push(elements[i].value);
        }

        var form_data = new FormData();
        form_data.append('buttons', JSON.stringify(button));
        form_data.append('id', id);
        $.ajax({
            type: 'POST',
            url: '#',
            contentType: false,
            processData: false,
            data: form_data,
            success:function() {
                console.log("DEBUG: button is modified");
            }

        });


    }
</script>
