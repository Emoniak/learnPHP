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
        $token = uniqid(sha1(date('Y-m-d|h:m:s')),false);

        $sql = "insert into t_users(usenom,useprenom,usemail,usepassword,usertoken,id_groupes) VALUE ('$name','$firstName','$mail','$password','$token',3)";

        $rec -> insert($sql);

        $message = "<h1>Wunderbarr !!!! </h1>";
        $message .="<p>Vous êtes inscrit!!!!</p>";
        $message .="<p>Merci de cliquer sur le lien pour valider</p>";
        $message .= "<p><a href='http://localhost/cesi_php/index.php?'";
        $message .= "page=validationInscription&amp;token=";
        $message .= $token;
        $message .= "' target='_bank'>Lien</a></p>";

        mail($mail,'Confirmation compte',$message);
        echo"<p> insert complete </p>";
    }

}else{
    include "frmRegistration.php";
}
?>