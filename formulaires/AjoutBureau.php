


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
    <form method="post"  class="border rounded shadow p-3" action="../traitements/bureau.php" style="width:550px;">
    <h3 class="text-center">Ajouter un bureau</h3>
        <div class=" form-group mt-3">
        <label >Nom du bureau:</label>
        <input type="text" class="form-control" placeholder="nom" name="nom">
        </div>
        <div class=" form-group mt-3">
            <p>Centre de vote:</p>  
        <select name="centre" class="form-select">
        <?php foreach($items as $item):?> 
         <option value="<?php if($item->id_centre==$id_centre_vote) echo"selected"?>"><?=$item->nom_centre?></option>
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