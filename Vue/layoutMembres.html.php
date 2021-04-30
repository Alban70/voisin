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

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
    <!--<script src="./js/jquery.flexslider-min.js"></script>-->

    <!--<link rel="stylesheet" href="./theme/css/flexslider.css">-->


    <!--<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/uitotop.css">
    <!--<link rel="stylesheet" media="screen" href="<?php //echo \lib\Application::$racine; ?>theme_admin/css/style.css" type="text/css">-->

    <link rel="stylesheet" href="<?php echo \lib\Application::$racine; ?>css/style.css" >
    <style>
        .firstLink{
            color: #000000;
        }
        .firstLink:hover{
            text-decoration:none;
            background-color: antiquewhite;
        }

    </style>

        
        <!--<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
  			$('.flexslider').flexslider({
			    animation: "slide",
			    pauseOnHover: true,
			    slideshowSpeed: 5000,
			    animationSpeed:500,
			  });
			});
		</script>-->
                
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	</head>
    <body>
<div id="page">
    
<?php
//include THEME_ADMIN .'vue/commune/headerAdmin.php';
include 'headerAdmin.php';
?>

<?php echo $contenu; ?>
 
<?php
include 'footer.php';
//include THEME .'vue/commune/footer.php';
?>
</div>

<?php //include 'inc/' .$file; ?>
<?php //include __DIR__.'/../inc/' .$file;?>
</body>

<script>
    new WOW().init();

    $().UItoTop({ easingType: "easeOutQuart"});
</script>


<script src="<?php echo RACINE; ?>theme/js/admin.js"></script>
</html>
