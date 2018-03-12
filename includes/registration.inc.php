<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 12/03/2018
 * Time: 14:47
 */
echo "<h1> inscription </h1>";

if(isset($_POST['frmRegistration'])) {
    $name = $_POST['name'] ?? "";
    $firstName = $_POST['firstName'] ?? "";
    $mail = $_POST['mail'] ?? "";
    $password = $_POST['password'] ?? "";

    $erreur = array();

    if($name == "")
        array_push($erreur,"veuiller saisir un nom");
    if($firstName == "")
        array_push($erreur,"veuiller saisir un prenom");
    if($mail == "")
        array_push($erreur,"veuiller saisir un mail");
    if($password == "")
        array_push($erreur,"veuiller saisir un mdp");

    if(count($erreur) > 0){
        $message = "<ul>";

        for ($i = 0 ; $i < count($erreur) ; $i++){
            $message .= "<li>";
            $message .= $erreur[$i];
            $message .= "</li>";
        }

        echo $message;
        include "frmRegistration.php";

        $message .="</ul>";
    }

    else{
        //injection base
        echo "merci devotre inscription ;)";
    }

}else{
    include "frmRegistration.php";
}


?>