


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');
$centre = "SELECT * FROM centre";
$requet = $connexion->prepare($centre);
$requet->execute();
$items = $requet->fetchAll();
if(isset($_GET['id_bureau'])){
    $id = $_GET['id_bureau'];
    $sql = "SELECT * FROM bureau WHERE id_bureau = ?";
    $edit = $connexion->prepare($sql);
    $edit->execute(array($id));
    if($edit->rowCount()>0){
        $bureau = $edit->fetch();
        
    }
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
            $sql = "UPDATE bureau SET nom_bureau_vote =?,id_centre_vote= ? WHERE id_bureau =?";
            $insert = $connexion->prepare($sql);
            $insert->execute(array($name,$centre,$id));
            if($insert->rowCount()===1){
                header('Location:../views/allBureau.php');
                echo"les données sont modifiés avec success";
            
            }
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../asset/header.php');?>
    
</head>
<body>
<?php include('../asset/nav.php');?>
    
</body>
</html>

<div class="container pt-3 d-flex justify-content-center align-items-center" style="min-height:150vh ;">
    <form method="post"  class="border rounded shadow p-3" style="width:550px;">
    <h3 class="text-center">Modifier un bureau</h3>
        <div class=" form-group mt-3">
        <label >Nom du bureau:</label>
        <input value="<?=$bureau->nom_bureau_vote?>" type="text" class="form-control"  name="nom">
        </div>
        <div class=" form-group mt-3">
            <p>Centre de vote:</p>  
        <select name="centre" class="form-select">
        <?php foreach($items as $item):?> 
         <option  value="<?= $item->id_centre ?>"><?=$item->nom_centre?></option>
         <?php endforeach;?>
       </select>
      
        </div>
        <div class="mt-3">
            <button type="submit" name="envoyer" class="btn btn-success w-100">Ajouter bureau</button>
        </div>

    </form>
</div>
<?php
include('../asset/footer.php');
?>