<?php
$user = 'root';
$pass='';
try{
    $connexion = new PDO('mysql:host=localhost;dbname=projetL2',$user,$pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);


}catch(PDOException $e){
    echo"erreur".$e->getMessage();
}


?>