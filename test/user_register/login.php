<?php include_once 'includes/header.php'; ?>
<?php include_once 'classLoader.php'; ?>
<?php
$userC = new UserController();
$error = array();
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password)){
    array_push($error,"Niste uneli sva polja !");
  }

  else{
    $login = $userC->loginUser($username,$password);
    if($login){
      return true;
    }
    else{
     array_push($error,"Korisnik nije registrovan !");
    }
  }
}
 ?>
<div class="container">

  <h3 class="text-center">Login korisnika</h3>
   <form class="" action="" method="post">
   <div class="label-container">
     <p>Username : </p>
     <p>Password :</p>
  </div>
  <div class="form-container">
    <input type="text" name="username" placeholder="Korisnicko ime" class="input-register">
    <input type="password" name="password" placeholder="Password" class="input-register">
    <input type="submit" name="login" value="Login" class="input-register-btn"><br><br>
   </form>
   </div>




  </div>
<p class="text-center" style="color:black;font-weight:bold;">Ukoliko niste nas clan molimo vas da se <a href='index.php'> registrujete</a></p>
</div>

<?php include_once 'errors.php'; ?>
<?php include_once 'includes/footer.php'; ?>
