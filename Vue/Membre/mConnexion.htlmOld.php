<?php

//session_start();
//$titre="connexion";

?>


<?php
//try
{

	//$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
//catch(Exception $e)
{

        //die('Erreur : '.$e->getMessage());
}
?>

<?php
if (isset($erreur)):

    if ($erreur == ''):
        var_dump($erreur);
        $Date= date('Y-m-d h : i : s ');
        //global $pdo;

        //$sql = 'INSERT INTO contact(genre, nom, email, objet, message, date, interet) VALUES(:genre, :nom, :email, :objet, :message, :date, :interet)';
        //$result = $pdo->prepare($sql);
//$result->bindValue(':id', 1, PDO::PARAM_INT);
        //$result->bindParam(':id', $id, PDO::PARAM_INT);
        //$result->execute(array(
            //'genre' => $_POST['genre'],
            //'nom' => $_POST['nom'],
            //'email' => $_POST['email'],
            //'objet' => $_POST['objet'],
            //'message' => $_POST['message'],
            //'interet' => $interet,
            //'date' => $Date,
        //));;
//$result->execute([':id'=>$id]);
//$produits = $result->fetchAll();


        ?>

    <?php else: ?>
        <div class="erreur">
            <?php echo 'bonjour'; //$erreur; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

            <section class="content3">
<?php  var_dump($erreur); var_dump($_POST);?>

                <section class="view" id="cm_vente">
                    <div class="content_main">
                     <div class="content_titre_gray">
                <p class="txt_titre_black_left_margin">Well-Com Solution</p>
                </div>
                    <div class="content_slogan_blue">
                    <p class="txt_slogan_blue"><strong>Faites confiance à des spécialistes</strong></p>
                    </div>
                    <div class="content_txt">
               <p class="txt_societe">Spécialisée dans le développement d'un gestionnaire d'application, Well-Com Solution propose aux équipes commerciales, marketing ou encore au service client une plateforme informatique permettant de créer et gérer une grande diversité d'applications spécifiques ou non.</p>
                    </div>

                </div> 
                <div class="imag_vente">
                     <img src=".\uploads\Logo-Well-Com-Couleur.svg" class="imag_vente" alt="logo">
                </div>
                </section>
                
                
                <div style="text-align:center;display:block;width:100%;max-width:600px;margin-left:auto;margin-right:auto">
                    <p>bonjour</p> <?php echo 'bonjour'; echo $erreur; ?>
                                    <form method="post" action=""?page=valider"">
     <p>bonjour</p>
                                        <!--<fieldset>-->
                                       <legend>Vos coordonnées</legend> <!-- Titre du fieldset --> 
                                        <label for="email">Quel est votre e-mail ?</label>
                                       <input type="email" name="email" id="email" />
                                       <label for="pass">Votre mot de passe :</label>
                                       <input type="password" name="pass" id="pass"  /><br/>
                                       <input type="submit" name="ok" value="Valider" />
  
                                    </form>
                                    <p> <a href="mPcreat_membre.php" class="myButton_crm">s'inscrire</a></p>
                                    <p> <a href="famille.php" class="myButton_crm">Admin</a></p>
                                        <!--</fieldset>-->
                </div>
                </section>
















































