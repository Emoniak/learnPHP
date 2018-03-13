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
        $rec = new Queries();
        $password = sha1($password);

        $sql = "insert into t_users(usenom,useprenom,usemail,usepassword,id_groupes) VALUE ('$name','$firstName','$mail','$password',3)";

        $rec -> insert($sql);
        echo"<p> insert complete </p>";
    }

}else{
    include "frmRegistration.php";
}


?>