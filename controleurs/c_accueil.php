<?php
if (!isset($_REQUEST['action']))
	$action = "afficher" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
{
	case "afficher" : { 
            require "vues/v_connexion_inscription.php" ; 
            break ;             
        }
        case "connexion" : {
            
            $login = $_REQUEST['username'];
            $password = $_REQUEST['pass'];
            $id = $_SESSION['id'];
            if (verifierIdentification($login, $password, $id)) {
               
                
                require "vues/v_tco.php";
                echo"<script language=\"javascript\">";
                    echo "alert('Vous êtes connecté')";
                    echo"</script>";
                
                
            }
            
            else{
                
                    echo"<script language=\"javascript\">";
                    echo "alert('Identifiant ou Mots de passe Incorrecte')";
                    echo"</script>";
                    require "vues/v_connexion_inscription.php" ;
                }
            
            break ;
    }
    case "inscription" : {


        $name = $_REQUEST['name'];
        $fname = $_REQUEST['fname'];
        $login = $_REQUEST['login'];
        $tel = $_REQUEST['tel'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        

        if($name != "" && $fname != "" && $login != "" && $tel != "" && $tel != "" && $email != "" && $pass != "" ) {

            insertInscription($name, $fname, $login, $tel, $email, $pass);
        }
        require "vues/v_connexion_inscription.php";
                echo"<script language=\"javascript\">";
                    echo "alert('Vous êtes Inscrit')";
                    echo"</script>";
                    
        require "vues/v_connexion_inscription.php";
        break;
        
    }
    case "info" :{
        
            $id = $_SESSION['id'];
            $lesInfos = getRecupInfo($id);
            require "vues/v_info.php";
            break;
        }
        case "infomaj" :{
        
            
            $id = $_SESSION['id'];
            $lesInfos = getRecupInfo($id);

      
           
            require "vues/v_infomaj.php";
            break;
        }
        case "recupinfomaj" :{
        
           $id = $_SESSION['id'];
           
            
            $lesInfos = getRecupInfo($id);
           
           $name = $_REQUEST['name'];
           $fname = $_REQUEST['fname'];
           $email = $_REQUEST['email'];
           $tel = $_REQUEST['tel'];
        

        if($name != $lesInfos['utl_nom'] && $fname != $lesInfos['utl_prenom'] && $tel != $lesInfos['utl_mobile'] && $email != $lesInfos['utl_mail'] ) {

            getmajinfo($name, $fname,$email, $tel);
        }
        
           
            require "vues/v_infomaj.php";
           
            break;
        }
        
        
}


