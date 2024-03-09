<?php
include('../configuration/database.php');
if(isset($_POST['envoyer'])){
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $centre = $_POST['centre'];

    $errors = [];
    if(!empty($name)&&
    !empty($email)
    &&!empty($password)&&
    !empty($centre)
    ){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="email invalide...";
        }

    }else{
        $errors[]="veuillez remplir tous les champs stp...";
    }
    if(empty($errors)){
        $sql = "INSERT INTO president(nom_utilisateur,email_utilisateur,mot_de_pass,id_centre_vote)VALUES(?,?,?,?)";
        $president = $connexion->prepare($sql);
        $president->execute(array($name,$email,$password,$centre));
        if($president->rowCount()===1){
            header('Location:../views/allPresident.php');
            echo"les données sont inserés avec success";
        
        }
    }
}

?>