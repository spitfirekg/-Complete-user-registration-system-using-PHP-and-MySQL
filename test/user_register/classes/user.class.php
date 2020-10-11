<?php
session_start();
include_once 'classes/connection.class.php';
//Kreiranje modelske klase user
class User extends Connection{

  //Metoda za registraciju korisnika
protected function userRegister($username,$email,$password1,$ime,$prezime,$grad,$telefon,$clanOd){
  $password1 = md5($password1);
  try {
    $sql = "INSERT INTO users(username,user_email,user_password,user_name,user_lname,user_city,user_phone,user_from) VALUES
                     (:username,:user_email,:user_password,:user_name,:user_lname,:user_city,:user_phone,:user_from) ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute(array(":username"=>$_POST['username'],
                         ":user_email"=>$_POST['email'],
                         ":user_password"=>$password1,
                         ":user_name"=>$_POST['ime'],
                         ":user_lname"=>$_POST['prezime'],
                         ":user_city"=>$_POST['grad'],
                         ":user_phone"=>$_POST['telefon'],
                         ":user_from"=>$_POST['clanOd']));
    //Ukoliko je registracija korisnika u bazu uspesno zavrsena kreirati sesije i preusmeriti na drugu stranicu
  if($stmt){
    $_SESSION['userLogedIn'] = true;
    $_SESSION['user'] = $_POST['ime']." ".$_POST['prezime'];
    header('location:success.php');
  }
  } catch (PDOException $e) {
    echo "Greska : ".$e->getMessage();
  }
}



//Metoda kojom se proveravaju  postojeci korisnici
 protected function ifUserExist($email){
   try {
     $sql = "SELECT * FROM users WHERE user_email=:email";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute(array(":email"=>$_POST['email']));
     $row = $stmt->fetch();
     //Ukoliko je broj trazenih korisnika > 0 vratiti vrednost
     if($stmt->rowCount() > 0){
       return $row;
     }
    $this->connClose();
   } catch (PDOException $e) {
     echo "Greska : 1";
   }
 }




 //Metoda za login korisnika
 protected function userLogin($username,$password){
   $password = md5($password);
   try {
     $sql = "SELECT * FROM users WHERE username=:username AND user_password=:password";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute(array(":username"=>$username,":password"=>$password));
     //Ukoliko je broj korisnika > 0 kreirati sesije i preusmeriti na stranicu welcomeUser.php
     if($stmt->rowCount() > 0){
       $_SESSION['userLogedIn'] = true;
       $_SESSION['user'] = $username;
       header("location:welcomeUser.php");
     }
    $this->connClose();
   } catch (PDOException $e) {
     echo "Greska : ".$e->getMessage();
   }

 }



}
 ?>
