<?php
include('../configuration/database.php');
if(isset($_POST['envoyer'])){


    $bureau = $_POST['bureau'];
    $candidat = $_POST['candidat'];
    $score = $_POST['score'];
    $nombre = 100;
   
    $errors = [];
    if(!empty($bureau)&&
    !empty($candidat)
    &&!empty($score)){
       
        

    }else{
        $errors[]="veuillez remplir tous les champs stp...";
    }
    if(empty($errors)){
        
        $sql = "INSERT INTO score(id_bureau_vote,id_candidat, score_obtenu)VALUES(?,?,?)";
        $centre = $connexion->prepare($sql);
        $centre->execute(array($bureau,$candidat,$score));
        if($centre->rowCount()===1){
            header('Location:../views/allResultat.php');
            echo"les données sont inserés avec success";
        
        }
    }
    
}

?>