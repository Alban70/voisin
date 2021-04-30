<section class="content_top" style="background-image: none; !important;">


    <div id="contact" class="contact">


        <form method="post" enctype="multipart/form-data" action ="<?php echo \Lib\Application::$racine ?>admin/addedito">

            <div class="contact_form">
                <input type="text" name="titre" id="titre" placeholder="Titre*" />
            </div>

            <textarea name="contenu" class="form-control" id="editor" rows="15" cols="150"></textarea>

            <div class="contact_form">
                <input type="text" name="contenu" id="contenu" placeholder="Contenu*" /></br>
            </div>

            <!--<div class="contact_form">
                <select class="form"  name="famille" id="famille">
                    <option value="0">Sélectionnez Famille...</option>
                    <?php //foreach ($familles as $famille): ?>
                        <option value="<?php //echo $famille->getFamId(); ?>" selected><?php //echo $famille->getLibelle(); ?></option>
                    <?php //endforeach; ?>

                </select>
            </div>-->

            <div class="contact_form">
                <select class="form"  name="famille">
                    <option value="0">Sélectionnez Famille...</option>
                    <?php foreach ($familles as $famille): ?>
                        <option value="<?php echo $famille->getFamId(); ?>" selected><?php echo $famille->getLibelle(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>



            <div class="content">
                <button type="submit" class=" btn btn-primary" name="ValContact">Valider</button>
            </div>


        </form>
    </div>
</section>


