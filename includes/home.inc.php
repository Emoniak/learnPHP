<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 12/03/2018
 * Time: 14:47
 */
if (isset($_GET["page"])) {
    $token = $_GET["token"];
    $valid = new checkInscription();
    $check = $valid->valid($token);

    if ($check == 1)
        echo "<p>merci d'avoir confirmer votre compte</p>";
    else
        echo "<p>erreur lors de la validation, votre compte est deja valider".
             " si l'erreur perciste merci de contacter l'aide du site </p>";

}
else{
    $check = -1;
    include "frmConnexion.php";
    $conn = new Queries();

    if (isset($_POST["id"]) || isset($_POST["mdp"])){
        $id = $_POST["id"];
        $password = sha1($_POST["mdp"]);
        $sql = "select id_users from t_users where usemail = '$id' and usepassword = '$password'";
        $check = $conn ->JCVD($sql) ->rowCount();

    }

    if ($check == 1)
        echo "vous este authentifier";
    elseif ($check == 0){
        echo "email ou mot de passe incorect";
        header('#');
    }

}
?>