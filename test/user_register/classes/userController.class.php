<?php
//Kreiranje kontrolera klase user
class UserController extends User{


  //Metoda kontrolera za registraciju korisnika
public function registerUser($username,$email,$password1,$ime,$prezime,$grad,$telefon,$clanOd){
  $result = $this->userRegister($username,$email,$password1,$ime,$prezime,$grad,$telefon,$clanOd);
}


//Metoda kontrolera za proveru dali korsnik vec postoji u bazi prilikom registracije
 public function checkExistedUser($email){
   $result=$this->ifUserExist($email);
   return $result;
 }

//Metoda kontrolera za logovanje korisnika
public function loginUser($username,$password){
  $result = $this->userLogin($username,$password);
}








}
 ?>
