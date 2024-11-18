<?php
//la connexion avec la base de données;
$con = mysqli_connect("localhost","root","","gestion_produits");
if (!$con) {
    echo 'probleme de connexion';
}
 ?>