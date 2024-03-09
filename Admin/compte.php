



<?php
session_start();
include('../configuration/database.php');
$sql = "SELECT * FROM admin";
$request = $connexion->prepare($sql);
$request->execute();
if($request->rowCount()>0){
    $users = $request->fetch();
    $id = $users->id;
    $nom = $users->nom;
    $prenom = $users->prenom;
    $email = $users->email;
    $tel = $users->téléphone;
    $add = $users->adresse;
    $user = $users->user;
    $pass =$users->password;
   
}
if(isset($_POST['update'])){
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $add = $_POST['add'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
   // var_dump($user,$pass,$nom,$prenom,$email,$tel,$add,$user,$id);

    
    $sql = "UPDATE admin SET nom = ?,prenom = ?,email = ?,téléphone = ?,adresse = ?,user= ?,password = ? WHERE id = ?";
    $request = $connexion->prepare($sql);
    $request->execute([$nom,$prenom,$email,$tel,$add,$user,$pass,$id]);
    if($request->rowCount()===0){
        die("votre compte a été mise en jours");
    }

   // var_dump($user,$pass,$nom,$prenom,$email,$tel,$add,$user,$id);


    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte .<?=$_SESSION['user']?></title>
    <?php include('../asset/header.php');?>
    
</head>
<body>
<section class="py-5">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-6">
            <form method="post" class="border rounded shadow p-3">
                <h3 class="text-center">Compte <?=$user?> </h3>
                <input type="text"  value="<?=$id?>"hidden>
                    <div class="form-group mt-3">
                    <label>Nom:</label>
                    <input type="text"value='<?=$nom!=''? $nom:''?>' name="nom" class="form-control">
</div>
                    <div class="form-group mt-3">
                    <label>Prénom:</label>
                    <input type="text" value='<?=$prenom!=''? $prenom:''?>' name="prenom" class="form-control">
</div>
                    <div class="form-group mt-3">
                    <label>Adresse éléctronique:</label>
                    <input type="email" value='<?=$email!=''? $email:''?>'name="email" class="form-control">
</div>
                    <div class="form-group mt-3">
                    <label>Téléphone:</label>
                    <input type="text" name="tel"value='<?=$tel!=''? $tel:''?>' class="form-control">
</div>
                    <div class="form-group mt-3">
                    <label>Adresse:</label>
                    <input type="text" name="add"value='<?=$add!=''? $add:''?>' class="form-control">
</div>

                    <div class="form-group mt-3">
                    <label>nom d'utilisateur:</label>
       
                    <input type="text" name="user"value='<?=$user!=''? $user:''?>' class="form-control">
</div>

                    <div class="form-group mt-3">
                    <label>Mot de pass:</label>
                    <input type="password" id="myinput"name="pass"value='<?=$pass!=''? $pass:''?>' class="form-control">
                    </div>
    <div class="form-check mt-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" onclick="myFunction()" > Montrer le mot de pass
    </label>
  </div>

<div class="mt-3">
    <button type="submit" name ="update" class="btn btn-success w-100 shadow-sm">mise à jour</button>
</div>

            </form>
            
        </div>
    </div>
</section>
</body>
</html>
<script>
    function myFunction() {
  var x = document.getElementById("myinput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
<?php
include('../asset/footer.php');
?>