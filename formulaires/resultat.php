


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');
//récupérer tous les bureaux
$bureau = "SELECT * FROM bureau";
$requet = $connexion->prepare($bureau);
$requet->execute();
$allBureaux = $requet->fetchAll();
//récupérer tous les candidats
$candidat = "SELECT * FROM candidat";
$requet = $connexion->prepare($candidat);
$requet->execute();
$allCandidats = $requet->fetchAll();


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
    <form method="post"  class="border rounded shadow p-3" action="../traitements/score.php" style="width:600px;">
    <h3 class="text-center">Envoyer les resultats</h3>
       
        <div class=" form-group mt-3">
            <p>Bureau de vote:</p>  
        <select name="bureau" class="form-select">
        <?php foreach($allBureaux as $allBureau):?> 
         <option value="<?=$allBureau->id_bureau?>"><?=$allBureau->nom_bureau_vote?></option>
         <?php endforeach;?>
       </select>
        </div>
        <div class=" form-group mt-3">
            <p>candidat:</p>  
        <select name="candidat" class="form-select">
        <?php foreach($allCandidats as $allCandidat):?> 
         <option value="<?=$allCandidat->id_candidat?>"><?=$allCandidat->nom?></option>
         <?php endforeach;?>
       </select>
        </div>
       <div class=" form-group mt-3">
        <label >Score obtenu:</label>
        <input type="number" class="form-control"  name="score">
        </div>
        
        <div class="mt-3">
            <button type="submit" name="envoyer" class="btn btn-success w-100">Envoyer les resultats</button>
        </div>

    </form>
</div>
<?php
include('../asset/footer.php');
?>