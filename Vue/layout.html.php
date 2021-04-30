<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Les marges et la bordure</title>
    <meta name="description" content="Le plus simple des CRM">
    <meta name="author" content="DominicLandra">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="script/jquery.parallax-1.1.js"></script>


    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleGenerique.css">
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/style.css">
    <!--<link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleNav.css">-->
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleRibbon.css">
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleNavCodePen.css">
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleMenuToogle.css">
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleConsultants.css">
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/styleSliderRendeurs.css">

		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	</head>
    <body>
<div id="page">
    
<?php
include 'header/header.php';
?>

<?php echo $contenu; ?>
 
<?php

include 'footer/Footer.php';
?>
</div>

</body>

<script>
    new WOW().init();

    $().UItoTop({ easingType: "easeOutQuart"});
</script>



<script src="<?php echo \Lib\Application::$racine; ?>js/hamburgerRibbon.js"></script>
<script src="<?php echo \Lib\Application::$racine; ?>js/scrollHPC.js"></script>
<!--<script src="<?php echo \Lib\Application::$racine; ?>js/scrollHPCparallax.js"></script>-->
<script src="<?php echo \Lib\Application::$racine; ?>js/scrollcta.js"></script>
<script src="<?php //echo \Lib\Application::$racine; ?>js/SliderShowFusee.js"></script>
</html>
