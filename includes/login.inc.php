<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 12/03/2018
 * Time: 14:47
 */
$check = -1;
$conn = new Queries();

if (isset($_POST["id"]) || isset($_POST["mdp"])){
    $id = $_POST["id"];
    $password = sha1($_POST["mdp"]);
    $sql = "select id_users from t_users where usemail = '$id' and usepassword = '$password'";
    $check = $conn ->JCVD($sql) ->rowCount();

}

if ($check == 1){
    $_SESSION['login'] = true;
    $_SESSION['id'] = $id;
    echo "authentifié";
}
elseif ($check <= 0 )
{
    if ($check==0){
        echo "<p>email ou mot de passe incorect</p>";
        header('#');
    }
    include "frmConnexion.php";

}

?>