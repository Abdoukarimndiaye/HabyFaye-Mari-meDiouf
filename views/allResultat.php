


<?php
session_start();

if(!$_SESSION['pass'] AND !$_SESSION['user'] ){
	 header('Location:../Admin/login.php');
}
include('../configuration/database.php');

$score = "SELECT candidat.nom,score.score_obtenu,bureau.nom_bureau_vote FROM candidat INNER JOIN
score ON candidat.id_candidat = score.id_candidat INNER JOIN bureau ON bureau.id_bureau = score.id_bureau_vote";
$requet = $connexion->prepare($score);
$requet->execute();
$allscores = $requet->fetchAll();





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
         <td>Nom candidat</td>
         <td>Bureau de vote</td>
         <td>Score obtenu</td>
         <td>Status</td>
         
       </tr>
        </thead>
        <tbody>
        <?php foreach($allscores as $allscore):?>
                
            <tr>
                <td><?=$allscore->nom?></td>
                <td><?=$allscore->nom_bureau_vote?></td>
                <td><?=$allscore->score_obtenu?> Voix</td>
               
            </tr>
            <?php endforeach?>
           

        </tbody>
    </table>
</div>
<?php
include('../asset/footer.php');
?>