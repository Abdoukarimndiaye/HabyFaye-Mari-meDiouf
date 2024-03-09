<?php
include('../configuration/database.php');
if(isset($_POST['envoyer'])){

    $name = $_POST['nom'];
    $centre = $_POST['centre'];
    $errors = [];
    if(!empty($name)&&
    !empty($centre)){

    }else{
        $errors[]="veuillez remplir tous les champs stp...";
    }
    if(empty($errors)){
        $sql = "INSERT INTO bureau(nom_bureau_vote,id_centre_vote)VALUES(?,?)";
        $insert = $connexion->prepare($sql);
        $insert->execute(array($name,$centre));
        if($insert->rowCount()===1){
            header('Location:../views/allBureau.php');
            echo"les données sont inserés avec success";
        
        }
    }
}

?>