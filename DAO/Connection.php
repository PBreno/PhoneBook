<?php

namespace DAO;

class Connection {

   public $user = "ninjabp";
   public $password="Nbp@79733ce";
   public $database = "phonebook";
   public $host="localhost";

   public function __construct(){}
   //Database Connection
   public function connection() {

        try{

           $conn = new \PDO("mysql:host$this->host;dbname=$this->database", $this->user, $this->password);

           if ($conn){
            #   echo "Connected successfully";
               return $conn;
           }

           //$query  = 'SELECT *FROM phonebook.singup';

          /* foreach ($conn->query($query) as $user){
               echo '<pre>';
               echo $user;
               echo '<pre>';
           }*/
           #$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
   }

}