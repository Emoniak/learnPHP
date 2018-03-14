<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 12/03/2018
 * Time: 14:47
 */
echo "<h1> hello </h1>";
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
    echo "bonjour";

}
?>