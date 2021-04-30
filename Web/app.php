<?php
include '../Lib/AutoLoad.php';


//$app = new \Lib\Backend();
//$app = new \Lib\Frontend();
//$app->run();

/*if (preg_match('/admin|connexion/',$_SERVER['REQUEST_URI'])=== 1) {
    $app = new \Lib\Backend();
    $app->run();
} else {
    $app = new \Lib\Frontend();
    $app->run();
}*/
session_start();
if (isset($_SESSION['auth']) AND $_SESSION['auth'] === true) :
    $app = new \Lib\Backend();
    $app->run();
else:
    $app = new \Lib\Frontend();
    $app->run();

    endif;