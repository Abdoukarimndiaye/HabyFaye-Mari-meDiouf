<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
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
    <form method="post" autocomplete="off" action='../traitements/centre.php'  class="border rounded shadow p-3" style="width:550px;">
    <h3 class="text-center">Ajouter un centre</h3>
        <div class=" form-group mt-3">
        <label>Nom du centre:</label>
        <input type="text" class="form-control" placeholder="nom" name="nom">
        </div>
        <div class=" form-group mt-3">
        <label >nom du commune:</label>
        <input type="text" class="form-control" placeholder="commune" name="commune">
        </div>
        <div class=" form-group mt-3">
        <label >nom du region:</label>
        <input type="text" class="form-control" placeholder="region" name="region">
        </div>
        <div class=" form-group mt-3">
        <label >Nom du departement:</label>
        <input type="text" class="form-control" placeholder="departement" name="departement">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success w-100" name="envoyer">Ajouter centre</button>
        </div>
        </div>
       

    </form>
</div>

<?php
include('../asset/footer.php');
?>