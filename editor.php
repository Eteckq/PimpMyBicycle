<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="editor.css">
    <title>Editor</title>
  </head>
  <body>

    <div class="navbar">
      <?php include 'model/navbar.html' ?>
    </div>

    <div class="editor">
      <!-- Va contenir l'éditeur (sans tous les menus, juste l'affichage) -->
      <div id="view" style="background-color: beige;">



      </div>

      <div class="selectZone" style="top: 300px; left: 75px; min-width: 80px; min-height: 80px;" onclick="onSlot(0)"></div>
      <div class="selectZone" style="top: 300px; left: 350px; min-width: 80px; min-height: 80px;" onclick="onSlot(1)"></div>
      <div class="selectZone" style="top: 170px; left: 325px; min-width: 80px; min-height: 80px;" onclick="onSlot(2)"></div>

      <!-- Va contenir les menus -->
      <div id="menu" style="background-color: rgb(220, 245, 226);">
        Menus
        <button onclick="onShape()">Changer la forme</button>
        <button onclick="onSave()">Sauvegarder</button>
        <div id="shape">

        </div>
        <div id="pickers">

        </div>
      </div>
    </div>

    <div class="footer">
      <p>&copy; You gotta Pimp My Bicycle !</p>
    </div>

  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script.js"></script>
</html>
