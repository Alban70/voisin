<section class="content4">


    <section class="view" id="cm_vente">
        <div class="content_main">
            <div class="content_titre_gray">
                <p class="txt_titre_black_left_margin">Well-Com Solution</p>
            </div>
            <div class="content_slogan_blue">
                <p class="txt_slogan_blue"><strong>Commande en cours</strong></p>
    </section>

    <section id="logicielContacts" class="view2">

        <div class="content_vente">

            <form method="post">
                <!--<div class="membre">-->
                <fieldset>
                    <legend>Vos coordonnées</legend> <!-- Titre du fieldset -->
                    <!--<input type="number" name="soc_id" id="soc_id" value= "<?php //echo $contact->getSocId();?>" />-->
                    <div class="form">
                        <p>Société :</p>
                    </div>
                    <div class="form">
                        <?php echo $membre->getNom();?>
                    </div>
                    <div class="form">
                        <?php echo $membre->getVille();?>
                    </div><br/>
                    <!--<input type="number" name="Contact_id" id="Contact_id" value= "<?php //echo $auteur->getContactId();?>" >-->

                    <div class="form">
                        <p>Profil :</p>
                    </div>

                    <div class="form">
                        <?php echo $contact->getNom();?>
                    </div>
                    <div class="form">
                        <?php echo $contact->getPrenom();?>
                    </div></br>
                    <p>coord_id :</p>
                    <!--<input type="number" name="coord_id" id="coord_id" value= "<?php //echo $coordonnees->getCoordId();?>" >
                    <input type="number" name="id" id="id" value= "<?php //echo $auteur->getId();?>" >-->
                    <div class="form">
                        <p>Coordonées :</p>
                    </div>
                    <div class="form">
                        <?php echo $coordonnees->getEmail();?>
                    </div>
                    <div class="form">
                        <?php echo $coordonnees->getTel();?>
                    </div></br>

                </fieldset>
                <!--</div>-->
                <!--<button class = "btn btn-primary" name="ModifSte">Modifier votre profil</button>-->
                <button type="submit" class = "btn btn-primary" name="modifier" formaction ="<?php echo \Lib\Application::$racine ?>theme_membresPo/web/membre/edit">Modifier votre profil</button>
                <button type="submit" class = "btn btn-primary" name="modifier" formaction ="<?php echo \Lib\Application::$racine ?>theme_membresPo/web/commande/article">Ajouter une commande</button>
                <!--<button class = "btn btn-primary" name="supprimer" value = "Supprimer" >Supprimer</button><hr>-->
            </form>
        </div>

    </section>

    <!--<section class="content4" id="cm_vente">
        <form method="post" action="">



        <label for="libelle">libelle</label>
        <input type="text"  name="libelle" id="libelle" value= <?php //echo $commande->getLibelle();?> >


        <label for="type">type</label>
        <input type="text"  name="type" id="type" <?php //echo $commande['libelle'];?> >

        <label for="statut">statut</label>
        <input type="text"  name="statut" id="statut" <?php //echo $commande['statut'];?>>


            <input type="number" id="valeur_id" name="valeur_id" >
                <button class = "btn btn-primary" name="Ajouter">Ajouter</button>
                <button class = "btn btn-primary" name="Modifier">Modifier</button>
                <button class = "btn btn-primary" name="supprimer" value = "Supprimer" >Supprimer</button><hr><br>

    </form>
    </section>-->



    <table id="tableau" class="table table-sm table-dark table-hover" weight="400px">
        <tr>
            <th>N°</th>
            <th>Libellé</th>
            <th>date</th>
            <th>Sel</th>
        </tr>

        <?php

        $i=1;
        foreach($commandes as $i => $commande):

            echo "<tr id='id".(string)$i."'>";
           echo "<td id='id".$i."'>".$commande->getComId()."</td>";
            echo "<td >".$commande->getLibelle()."</td>";
            echo "<td><input type='checkbox' id='suppr".(string)$i."' onclick='numeroLigne();' /></td>";
            echo"</tr>";

        endforeach;

        ?>





    </table>





</section>

<!--<script src="./theme_membres/js/coursM.js"></script>-->