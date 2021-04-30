    <section id="CM" class="content4">


                <div class="content_titre_gray" style="width: 50%">
                    <p class="txt_titre_black_left_margin">Gestion des Articles</p>
                </div>





        <?php
        $i=1;
        foreach($all_editos as $i => $all_edito):
        ?>

            <div class="content_contact">
                <div class="content4">
                    <header>
                        <h1>

                    <a href=""><?php echo $all_edito->getTitre(); ?></a>
                        </h1>
                    </header>
                </div>


            <div class="view_footer">
                <div class="content_vente" style="width: 15%; padding: 0; margin: 0;">

                </div>
                <div class="content_vente" style="width: 85%;  padding: 0; margin: 0;">
                    <p class="txt_slogan" style="color: gray"><?php echo $all_edito->getContenu(); ?></p>
                </div>
            </div>
            </div>

        <?php
        endforeach;

        ?>









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

