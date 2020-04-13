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
        display: flex;
        flex-direction: row;
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
        display: block  
    }
</style>


<div class="editor">
    <!-- Va contenir l'éditeur (sans tous les menus, juste l'affichage) -->
    <div id="view" style="background-color: beige;">

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
        <div class="selectZone" style="top: 230px; left: 250px; min-width: 120px; min-height: 100px;" onclick="onSlot(4)">
        </div>

    </div>

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

    <div id="userBuilds">
    <?php foreach($userBikes as $bike){ ?>
        <a href="/?page=preview&id=<?= $bike->id ?>">Edit <?= $bike->id ?> </a>
        <div class="render">
            <iframe src="http://localhost:31313/?page=preview&id=<?= $bike->id ?>&action=viewBike" frameborder="0" width="410px" height="330px"></iframe>
        </div>

        <?php } ?>
    </div>
</div>



<script src="/include/js/editor.js"></script>


<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>