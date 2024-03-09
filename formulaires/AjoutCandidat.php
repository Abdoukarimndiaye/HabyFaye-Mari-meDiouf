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
    
</body>
</html>
<?php include('../asset/nav.php');?>
    

<div class="container pt-3 d-flex justify-content-center align-items-center" style="min-height:150vh ;">
    <form method="post" action='../traitements/candidat.php'  class="border rounded shadow p-3" style="width:550px;">
    <h3 class="text-center">Ajouter  candidat</h3>
    
    <?php if (isset($errors)) : ?>
    <?php foreach ($errors as $error) : ?>
        <div class="container pt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

        <div class=" form-group mt-3">
        <label  >Nom du candidat:</label>
        <input type="text" class="form-control" placeholder="nom" name="nom">
        </div>
        <div class=" form-group mt-3">
        <label >Parti politique::</label>
        <input type="text" class="form-control" placeholder="parti" name="parti">
        </div>
        <div class="mt-3">
            <button type="submit" name="envoyer" class="btn btn-success w-100">Inscrire  candidat</button>
        </div>

    </form>
</div>