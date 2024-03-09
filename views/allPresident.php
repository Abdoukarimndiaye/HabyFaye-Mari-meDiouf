


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');

$president = "SELECT centre.nom_centre,president.id_utilisateur, president.nom_utilisateur
,president.email_utilisateur FROM centre INNER JOIN
president ON president.id_centre_vote = centre.id_centre";
$requet = $connexion->prepare($president);
$requet->execute();
$allPresidents = $requet->fetchAll();
if(isset($_GET['id_utilisateur'])){
    $id = $_GET['id_utilisateur'];
    $sql = "SELECT * FROM president WHERE id_utilisateur = ?";
    $delete = $connexion->prepare($sql);
    $delete->execute(array($id));
    if($delete->rowCount()>0){
        //supprimer le president
        $sql = "DELETE FROM president WHERE id_utilisateur=?";
        $deletepresident = $connexion->prepare($sql);
        $deletepresident->execute(array($id));
        echo"president supprimé";
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

<div class="container pt-3">

    <table class="table">
        <thead class="bg-dark text-white">
       <tr>
        <td>Nom </td>
         <td>Email</td>
         <td>Centre de vote</td>
         <td>Action</td>
       </tr>
        </thead>
        <tbody>
        <?php foreach($allPresidents as $allPresident):?>
                
            <tr>
                <td><?=$allPresident->nom_utilisateur?></td>
                <td><?=$allPresident->email_utilisateur?></td>
                <td><?=$allPresident->nom_centre?></td>
                <td>
                <a class="btn btn-danger" href="../views/allPresident.php?id_utilisateur=<?= $allPresident->id_utilisateur ?>"><i class="las la-trash-alt"></i>
                        </a>
                </td>

            </tr>
            <?php endforeach?>
           

        </tbody>
    </table>
</div>
<?php
include('../asset/footer.php');
?>