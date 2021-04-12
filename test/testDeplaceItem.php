<?php /*<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <style>
          body {
            background: darksalmon;
          }
          .fill {
            background-image: url('https://source.unsplash.com/random/150x150');
            position: relative;
            height: 150px;
            width: 150px;
            top: 5px;
            left: 5px;
            cursor: pointer;
          }
          .hold {
            border: solid 5px #ccc;
          }
          .box {
            display: inline-block;
            height: 160px;
            width: 160px;
            margin: 10px;
            border: solid 3px salmon;
            background: white;
          }
          .hovered {
            background: #f4f4f4;
            border-style: dashed;
          }
        </style>
    </head>
    <body>
        <div class="master" style="">
          <p> Item 1:</p>
          <input id="ii1" value="1" disabled></input>
          <p> Item 2:</p>
          <input id="ii2" value="2" disabled></input>
          <p> Item 3:</p>
          <input id="ii3" value="3" disabled></input>
        </div>
        <div class="box filled" name="box" id="1">
            <div id="i1" class="fill" draggable="true"></div>
        </div>

        <div class="box filled" id="2">
            <div id="i2" class="fill" draggable="true"> </div>
        </div>

        <div class="box filled" name="box" id="3">
            <div id="i3" class="fill" draggable="true"> </div>
        </div>

        <div class="box" name="box" id="4">
        </div>

        <div class="box" name="box" id="5">
        </div>

        <div class="box" name="box" id="6">
        </div>

        <div class="box" name="box" id="7">
        </div>

        <div class="box" name="box" id="8">
        </div>

        <script>
          const fills = document.querySelectorAll('.fill');
          const empties = document.querySelectorAll('.box');

          var fillSelected;

          for (const fill of fills) {
            fill.addEventListener('dragstart', dragStart);
            fill.addEventListener('dragend', dragEnd);
          }
          for (const empty of empties) {
            empty.addEventListener('dragover', dragOver);
            empty.addEventListener('dragenter', dragEnter);
            empty.addEventListener('dragleave', dragLeave);
            empty.addEventListener('drop', dragDrop);
          }

          function dragStart() {
            fillSelected = this;
            document.getElementById("i" + document.getElementById(fillSelected.id)).className = "box";
            this.className += ' hold';
            setTimeout(() => (this.className = 'invisible'), 0);
          }

          function dragEnd() {
            this.className = 'fill';
          }

          function dragOver(e) {
            e.preventDefault();
          }

          function dragEnter(e) {
            if(this.className != 'box filled')
            {
              e.preventDefault();
              this.className += ' hovered';
            }
          }

          function dragLeave() {
            if(this.className != 'box filled')
            {
              this.className = 'box';
            }
          }

          function dragDrop(e) {
            if(this.className != 'box filled')
            {
              this.className = 'box filled';
              this.append(fillSelected);
              document.getElementById(document.getElementById("i" + fillSelected.id).value).className = "box";
              document.getElementById("i"+ fillSelected.id).value = e.target.id;
            }
            else
            {
              backBox = document.getElementById("i" + document.getElementById(fillSelected.id));
              backBox.append(fillSelected);
            }
          }
        </script>
    </body>
</html>
?>


<?php

if(isset($_POST['myCheckbox']))
{
    $myboxes = $_POST['myCheckbox'];
    if(empty($myboxes))
    {
        echo("You didn't select any boxes.");
    }
    else
    {
        $i = count($myboxes);
        echo("You selected $i box(es): <br>");
        for($j = 0; $j < $i; $j++)
        {
            echo $myboxes[$j] . "<br>";
        }
    }
}

?>

<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Drag & Drop Element | CodingNepal</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #304B5F;
            padding: 20px;
        }
        .wrapper{
            background: #fff;
            padding: 25px;
            max-width: 460px;
            width: 100%;
            border-radius: 3px;
            box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
        }
        .wrapper .item{
            color: #fff;
            display: flex;
            margin-bottom: 8px;
            padding: 12px 17px;
            background: #304B5F;
            border-radius: 3px;
            align-items: center;
            justify-content: space-between;
        }
        .wrapper .item:last-child{
            margin-bottom: 0px;
        }
        .wrapper .item .text{
            font-size: 18px;
            font-weight: 400;
        }
        .wrapper .item i{
            font-size: 18px;
            cursor: pointer;
        }


    </style>

</head>
<body>
<form method="POST">

    <div class="wrapper">
        <div class="item">
            <input style="display: none;" type="text" name="myCheckbox[]" value="A" />A<br />
            <span class="text">Draggable Element One</span>
            <i class="fas fa-bars"></i>
        </div>
        <div class="item">
            <input style="display: none;" type="text" name="myCheckbox[]" value="B" />B<br />
            <span class="text">Draggable Element Two</span>
            <i class="fas fa-bars"></i>
        </div>
        <div class="item">
            <input style="display: none;" type="text" name="myCheckbox[]" value="C" />C<br />
            <span class="text">Draggable Element Three</span>
            <i class="fas fa-bars"></i>
        </div>
        <div class="item">
            <input style="display: none;" type="text" name="myCheckbox[]" value="D" />D<br />
            <span class="text">Draggable Element Four</span>
            <i class="fas fa-bars"></i>
        </div>
        <div class="item">
            <input style="display: none;" type="text" name="myCheckbox[]" value="E" />E<br />
            <span class="text">Draggable Element Five</span>
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <button type="submit">Send</button>

</form>

<script>
    const dragArea = document.querySelector(".wrapper");
    new Sortable(dragArea, {
        animation: 350
    });
</script>

</body>
</html>

<?php
*/
echo serialize(array(1, 2, 3, 4));
?>

