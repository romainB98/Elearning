<?php

function verifierIdentification($mailSaisi,$mdpSaisi ) {
    require "connexion.php" ;
    $sql="select * from utilisateur" ;
    $exec=$bdd->query($sql);
    $trouve = false ;
    $fin=false ;
    while (!$trouve && !$fin)
    {
        if ($ligne = $exec->fetch())
        {
            if ($ligne['mail']==$mailSaisi && $ligne['password']==$mdpSaisi )
            {
                $trouve = true ;
                $_SESSION['mail']=$ligne['mail'] ;
                $_SESSION['password']=$ligne['password'] ;
                $_SESSION['id']=$ligne['id'] ;
            }
        }
        else
        {
            $fin = true ;
        }
    }
    return $trouve ;
}
function insertInscription($name, $prenom, $mail, $password, $student, $intervenant) {
        require "connexion.php" ;
        $sql = "insert into user (nom,prenom, mail, password, student, intervenant) values ('$name', '$prenom', '$mail', '$password', '$student', '$intervenant') " ;
           
        $exec= $bdd->prepare($sql) ;
        $exec->execute() ;
        
    }
