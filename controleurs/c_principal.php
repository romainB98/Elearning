<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "home" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}

switch ($uc)
{
    case 'home' : {  include "c_home.php" ; break ;}
    case 'connexion' : {  include "c_connexion.php" ; break ;}
    case 'home' : {  include "c_Inscription.php" ; break ;}
}

