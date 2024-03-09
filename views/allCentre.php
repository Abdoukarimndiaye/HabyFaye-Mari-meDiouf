


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');

if(isset($_GET['id_centre'])){
    $id = $_GET['id_centre'];
    $sql = "SELECT * FROM centre WHERE id_centre = ?";
    $delete = $connexion->prepare($sql);
    $delete->execute(array($id));
    if($delete->rowCount()>0){
        //supprimer le bureau
        $sql = "DELETE FROM centre WHERE id_centre=?";
        $deletebureau = $connexion->prepare($sql);
        $deletebureau->execute(array($id));
        echo"centre supprimé";
    }
}
$centre = "SELECT * FROM centre";
$requet = $connexion->prepare($centre);
$requet->execute();
$allCentres = $requet->fetchAll();
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

<div class="container pt-3">
   
    <table class="table">
        <thead class="bg-dark text-white">
       <tr>
        <td>Nom du Centre</td>
         <td>Nom du Commune</td>
         <td>Nom du  Département</td>
         <td>Nom du Region</td>
         <td>Action</td>
       </tr>
        </thead>
        <tbody>
        <?php foreach($allCentres as $allCentre):?>
                
            <tr>
                <td><?=$allCentre->nom_centre?></td>
                <td><?=$allCentre->nom_commune?></td>
                <td><?=$allCentre->nom_departement?></td>
                <td><?=$allCentre->nom_region?></td>
                <td>
                <a class="btn btn-danger" href="../views/allCentre.php?id_centre=<?= $allCentre->id_centre ?>"><i class="las la-trash-alt"></i>
                </td>

            </tr>
            <?php endforeach?>
           

        </tbody>
    </table>
</div>
<?php
include('../asset/footer.php');
?>