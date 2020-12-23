<!DOCTYPE html>
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