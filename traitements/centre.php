<?php
include('../configuration/database.php');
if(isset($_POST['envoyer'])){


    $name = $_POST['nom'];
    $commune = $_POST['commune'];
    $region = $_POST['region'];
    $departement = $_POST['departement'];

    $errors = [];
    if(!empty($name)&&
    !empty($commune)
    &&!empty($region)&&
    !empty($departement)
    ){

    }else{
        $errors[]="veuillez remplir tous les champs stp...";
    }
    if(empty($errors)){
        $sql = "INSERT INTO centre(nom_centre,nom_commune,nom_region,nom_departement)VALUES(?,?,?,?)";
        $centre = $connexion->prepare($sql);
        $centre->execute(array($name,$commune,$region,$departement));
        if($centre->rowCount()===1){
            header('Location:../views/allCentre.php');
            echo"les données sont inserés avec success";
        
        }
    }
}

?>