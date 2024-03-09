
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
    <form method="post" autocomplete="off" action='../traitements/president.php'  class="border rounded shadow p-3" style="width:550px;">
    <h3 class="text-center">Ajouter président</h3>
        <div class=" form-group mt-3">
        <label>Nom :</label>
        <input type="text" class="form-control" placeholder="votre nom" name="nom">
        </div>
        <div class=" form-group mt-3">
        <label >email:</label>
        <input type="text" class="form-control" placeholder="votre email" name="email">
        </div>
        <div class="form-group">
        <label >Mot de pass:</label>
        <input type="password" class="form-control"  name="password">
        </div>
        
        <div class=" form-group mt-3">
            <p>Centre de vote:</p>  
        <select name="centre" class="form-select">
        <?php foreach($items as $item):?> 
         <option value="<?=$item->id_centre?>"><?=$item->nom_centre?></option>
         <?php endforeach;?>
       </select>
      
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100" name="envoyer">Ajouter président</button>
        </div>
        </div>
       

    </form>
</div>

<?php
include('../asset/footer.php');
?>