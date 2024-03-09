


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');
$candidat = "SELECT * FROM candidat";
$requet = $connexion->prepare($candidat);
$requet->execute();
$allCandidats = $requet->fetchAll();
if(isset($_GET['id_candidat'])){
    $id = $_GET['id_candidat'];
    $sql = "SELECT * FROM candidat WHERE id_candidat = ?";
    $delete = $connexion->prepare($sql);
    $delete->execute(array($id));
    if($delete->rowCount()>0){
        //supprimer le candidat
        $sql = "DELETE FROM candidat WHERE id_candidat=?";
        $deletebureau = $connexion->prepare($sql);
        $deletebureau->execute(array($id));
        echo"candidat supprimé";
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


<div class="container pt-5">
<?php if(isset($_SESSION['notification']['message'])):?>
           <div class="alert alert-<?=$_SESSION['notification']['type']?>">
           <p><?=$_SESSION['notification']['message']?></p>
           </div>
           <?php endif?>
           <?php
           $_SESSION['notification']['message']='';
           $_SESSION['notification']['type']='';
           ?>
           

    
    <table class="table">
        <thead class="bg-dark text-white">
       <tr>
        <td>Nom</td>
         <td>Parti politique</td>
         <td>Action</td>
       </tr>
        </thead>
        <tbody>
        <?php foreach($allCandidats as $allCandidat):?>
                
            <tr>
               <td><?=$allCandidat->nom?></td>
                <td><?=$allCandidat->parti?></td>
                <td>
               
                <a class="btn btn-danger" href="../views/allcandidat.php?id_candidat=<?= $allCandidat->id_candidat ?>"><i class="las la-trash-alt"></i>
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