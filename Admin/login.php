
<?php
session_start();
include('../configuration/database.php');
if(isset($_POST['login'])){
    $user = htmlspecialchars($_POST['user']);
    $pass = $_POST['password'];
    $errors = array();
    if(!empty($user)
    && !empty($pass)
    ){
        $sql = "SELECT * FROM admin WHERE user = ? AND password = ?";
        $request = $connexion->prepare($sql);
         $request->execute(array($user,$pass));
        if($request->rowCount()>0){
           $_SESSION['user'] = $user;
           $_SESSION['pass'] = $pass;
           header('Location: ../index.php');
        }else
        die("information non reconnue ...");
        {
          return false;
        }
    


    }else{
        $errors[]="veuillez remplir tous les champs...";
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

    
</body>
</html>
<div class="bg-light">
<div class="container pt-3 d-flex justify-content-center align-items-center" style="min-height:150vh ;">
    <form method="post" autocomplete="off"  class="border rounded shadow p-3" action="" style="width:550px;">
    <h3 class="text-center">Admin</h3>
    <p class="text-center">Veuillez connectez à votre compte
        <div class=" form-group mt-3">
        <label >Nom d'utilisateur:</label>
        <input type="text" class="form-control" placeholder="votre nom " name="user">
        </div>
        <div class="mt-3">
        <label >Mot de pass:</label>
        <input type="password" class="form-control" id='myinput'  name="password">
        </div>
        <div class="form-check mt-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" onclick="myFunction()" > Montrer le mot de pass
    </label>
  </div>
       <div class="mt-3">
            <button type="submit" name="login" class="btn btn-success w-100">connexion</button>
        </div>

    </form>
</div>
</div>
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