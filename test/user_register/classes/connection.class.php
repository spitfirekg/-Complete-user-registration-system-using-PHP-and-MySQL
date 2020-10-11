<?php
class Connection {

    private $db_user;
    private $db_pass;


      function connect(){
      $this->db_user="root";
      $this->db_pass="";


      $dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
      $pdo = new PDO($dsn,$this->db_user,$this->db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }


    function connClose(){
      $pdo = null;
    }


  }
