<?php
session_start();
include('../configuration/database.php');
if(isset($_POST['envoyer'])){

    $name = $_POST['nom'];
    $parti = $_POST['parti'];
    $errors = [];
    
    if(!empty($name)&&
    !empty($parti)){

    }else{
        $errors[]="veuillez remplir tous les champs stp...";
    }
    if(empty($errors)){
        $sql = "INSERT INTO candidat(nom,parti)VALUES(?,?)";
        $insert = $connexion->prepare($sql);
        $insert->execute(array($name,$parti));
        if($insert->rowCount()===1){
           echo"candidat ajouté...";
            header('Location:../views/allCandidat.php');
           
        }
    }
}

?>