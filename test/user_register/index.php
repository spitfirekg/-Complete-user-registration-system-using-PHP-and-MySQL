<?php include_once 'includes/header.php'; ?>
<?php include_once 'classLoader.php'; ?>

<?php
$error = array();
$userC = new UserController();


if(isset($_POST['register'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $name = $_POST['ime'];
  $lName = $_POST['prezime'];
  $city = $_POST['grad'];
  $phone = $_POST['telefon'];
  $from = $_POST['clanOd'];

  if(empty($username) || empty($email) || empty($password1) || empty($password2) || empty($name) || empty($lName) || empty($city) || empty($phone) || empty($from) ){
    array_push($error,"Niste popunili sva polja !");
  }

  if($password1 != $password2){
    array_push($error,"Dva pasvorda nisu ista !");
  }

  if(count($error) == 0){
    $check = $userC->checkExistedUser($email);
    if($check){
      array_push($error,"Korisnik vec postoji !");
    }
    else{
      $register =$userC->registerUser($username,$email,$password1,$ime,$prezime,$grad,$telefon,$clanOd);
      if($register){
        return true;
      }
      else{
        return false;
      }
    }

  }
}

 ?>

<div class="container">

  <h2 class="text-center">Registranija korisnika</h2>
  <form class="" action="" method="post">
    <div class="label-container">
      <p>Korisnicko ime : </p>
      <p>Email adresa : </p>
      <p>Password : </p>
      <p>Potvrda password-a</p>
      <p>Ime : </p>
      <p>Prezime : </p>
      <p>Grad : </p>
      <p>Telefon : </p>
    </div>

    <div class="form-container">
      <input type="text" name="username" placeholder="Korisnicko ime" class="input-register">
      <input type="email" name="email" placeholder="Email adresa" class="input-register">
      <input type="password" name="password1" placeholder="Password" class="input-register">
      <input type="password" name="password2" placeholder="Potvrda password-a" class="input-register">
      <input type="text" name="ime" placeholder="Ime" class="input-register">
      <input type="text" name="prezime" placeholder="Prezime" class="input-register">
      <input type="text" name="grad" placeholder="Grad / Mesto" class="input-register">
      <input type="text" name="telefon" placeholder="Telefon" class="input-register">
      <input type="hidden" name="clanOd" placeholder="od" value="<?php echo date('Y-m-d'); ?>" class="input-register">
      <input type="submit" name="register" value="Registracija" class="input-register-btn">
    </div>

  </form>

</div>

<?php include_once 'errors.php'; ?>

<?php include_once 'includes/footer.php'; ?>
