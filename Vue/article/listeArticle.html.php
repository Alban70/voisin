    <section id="CM" class="content3">
        <section class="view3" id="cm_vente">

                <div class="content_titre_gray" style="width: 50%">
                    <p class="txt_titre_black_left_margin">Gestion des Articles</p>
                </div>
        <form method="POST" enctype="multipart/form-data>
            <label for="valeur_id">valeur_id</label>
            <input type="number" id="valeur_id" name="valeur_id" >

            <label for="libelle">libelle</label>
            <input type="text" name="libelle" id="libelle" value= "<?php //echo $article['libelle'];?>">

            <label for="designation">designation</label>
            <input type="text" name="designation" id="designation" value= "<?php //echo $article['designation'];?>">








            <button type="submit" class = "btn btn-primary" name="ajouter" formaction ="<?php echo \Lib\Application::$racine ?>theme_adminPo/web/article/add">Ajouter</button>
            <button type="submit" class = "btn btn-primary" name="modifier" >Modifier</button>
            <button type="submit" class = "btn btn-primary" name="supprimer" >Supprimer</button><br/>



        </form>


        <br>
        <table id="tableau" class="table table-sm table-dark table-hover" weight="400px">
            <tr>
                <th>N°</th>
                <th>Libellé</th>
                <th>Désignation</th>
                <th>Sel</th>
            </tr>


            <?php
            $i=1;
            foreach($articles as $i => $article):

                $i++;
                echo "<tr id='id".(string)$i."'>";
                echo "<td>".$article->getArticleId()."</td>";
                echo "<td >".$article->getLibelle()."</td>";
                echo "<td >".$article->getPrixHT()."</td>";
                echo "<td><input type='checkbox' id='suppr".(string)$i."' onclick='numeroL();' /></td>";
                echo"</tr>";


            endforeach;

            ?>





            </table>

        </section>
    </section>





    <!--<script src="./theme_membres/js/coursM.js"></script>-->







        <!--<script type="text/javascript" src='theme_admin/js/cours.js'></script>-->

        <!--<script>

            function numeroLigne()
            {
                console.log(400);
                var i = 0;
                var COCHE = false;
                // Parcours les lignes du tableau
                for (i=1;i< document.getElementById("tableau").rows.length;i++)
                {
                    console.log(23);
                    // Vérifie si les cases sont cochées
                    if(document.getElementById("suppr"+i).checked)
                    {
                        // case cochée
                        COCHE = true;
                        // Recupère l'identifiant des lignes cochées
                        var valeur_id = document.getElementById("id"+i).innerHTML;
                        // Transmet la variable valeur_id dans le input hidden de la page fournisseur.php
                        document.getElementById("valeur_id").value= valeur_id;
                        //console.log(document.getElementById("valeur_id").value= valeur_id);
                    }
                }
                if(!COCHE)
                {
                    alert("Pas de case cochée");
                    //return 0;
                    console.log(30);
                }
            }






        </script>-->

