<?php $title = 'Preview'; $menu = 'preview'; ?>
<?php ob_start(); ?>

<style>
    #view {
        position: relative;
        width: 600px;
        max-width: 600px;
        height: 500px;
        max-height: 500px
    }

    #editor {
        margin: auto;
        margin-top: 50px;
    }

    .selectZone {
        position: absolute;
    }

    .selectZone:hover {
        cursor: pointer;
        background-color: rgb(0, 0, 0);
        opacity: 0.05;
    }

    .render {
        display: none;
        position: absolute;
    }

    a:hover+.render {
        display: block;
    }

    #shape {
        max-height: 350px;
        overflow-y: scroll;
    }

    .shape:hover {
        background-color: rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
</style>


<div id="editor" class="container row">
    <!-- Va contenir l'éditeur (sans tous les menus, juste l'affichage) -->
    <div class="" id="view" style="background-color: beige;">

        <div id="draw"></div>

        <!-- Contient les hitboxs pour les clics sur les parties du vélo -->
        <div class="selectZone" style="top: 275px; left: 155px; min-width: 80px; min-height: 80px;" onclick="onSlot(0)">
        </div>
        <div class="selectZone" style="top: 275px; left: 360px; min-width: 80px; min-height: 80px;" onclick="onSlot(1)">
        </div>
        <div class="selectZone" style="top: 148px; left: 408px; min-width: 80px; min-height: 80px;" onclick="onSlot(2)">
        </div>
        <div class="selectZone" style="top: 140px; left: 230px; min-width: 80px; min-height: 80px;" onclick="onSlot(3)">
        </div>
        <div class="selectZone" style="top: 230px; left: 250px; min-width: 120px; min-height: 100px;"
            onclick="onSlot(4)">
        </div>

    </div>

    <!-- Va contenir les menus -->
    <div id="menu" style="background-color: rgb(220, 245, 226);">
        <button id="saveBtn" class="btn btn-success m-2" onclick="onSave()">Save</button>
        <button id="createBtn" class="btn btn-danger m-2" onclick="onCreate()">Create new</button>
        <div>
            <button id="shapeBtn" class="btn btn-info m-2" style="display:none" onclick="onShape()">Change
                shape</button>
            <div id="shape">

            </div>
        </div>
        <div id="pickers">

        </div>
    </div>

</div>

<div class="container" id="userBuilds">
    <h2>Saved bikes:</h2>
    <?php foreach($userBikes as $bike){ ?>
    <a class="btn btn-warning" href="/?page=preview&id=<?= $bike->id ?>">Bike #<?= $bike->id ?> </a>
    <div class="render">
        <iframe src="/?page=preview&id=<?= $bike->id ?>&action=viewBike" frameborder="0"
            width="410px" height="330px"></iframe>
    </div>

    <?php } ?>
</div>



<script src="/include/js/editor.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>