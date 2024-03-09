


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');
//recupérer les données de la table bureau et centre grâce au jointure
$bureau = "SELECT bureau.id_bureau, bureau.nom_bureau_vote,centre.nom_centre FROM bureau INNER JOIN  centre
ON bureau.id_centre_vote = centre.id_centre ";
$requet = $connexion->prepare($bureau);
$requet->execute();
$allBureaux = $requet->fetchAll();
//recupérer id du bureau
if(isset($_GET['id_bureau'])){
    $id = $_GET['id_bureau'];
    $sql = "SELECT * FROM bureau WHERE id_bureau = ?";
    $delete = $connexion->prepare($sql);
    $delete->execute(array($id));
    if($delete->rowCount()>0){
        //supprimer le bureau
        $sql = "DELETE FROM bureau WHERE id_bureau=?";
        $deletebureau = $connexion->prepare($sql);
        $deletebureau->execute(array($id));
        echo"bureau supprimé";
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
    <?php if(!empty($success)):?>
        <?php foreach($success as $success):?>
            <div class="aler alert-success">
                <?=$success;?>
            </div>
            <?php endforeach?>
        <?php endif;?>
    <table class="table">
        <thead class="bg-dark text-white">
       <tr>
        <td>Nom du bureau</td>
         <td>centre de vote</td>
         <td>Action</td>
       </tr>
        </thead>
        <tbody>
        <?php foreach($allBureaux as $allBureau):?>
                
            <tr>
               <td><?=$allBureau->nom_bureau_vote?></td>
                <td><?=$allBureau->nom_centre?></td>
                <td>
                       
                        <a class="btn btn-danger" href="../views/allBureau.php?id_bureau=<?= $allBureau->id_bureau ?>"><i class="las la-trash-alt"></i>
                        </a>
                        <a class="btn btn-success" href="../formulaires/modif_bureau.php?id_bureau=<?= $allBureau->id_bureau ?>"><i class="lar la-edit"></i>
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