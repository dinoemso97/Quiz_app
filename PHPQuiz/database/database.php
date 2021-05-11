<?php 

//Creating database with PHP and PDO drivers 


$PDO = new PDO('mysql: host=localhost;','root','');


$sql = "CREATE DATABASE `phpquizz`";
$database = $PDO->query($sql);



//Creating tables in database 


$sql1 = "CREATE TABLE `phpquizz`.`options`(

   id int(11) not null PRIMARY KEY AUTO_INCREMENT , 
   question_number int(11) not null , 
   is_correct tinyint(4) not null , 
   option text not null



);";

$table1 = $PDO->query($sql1);


$sql2 = "CREATE TABLE `phpquizz`.`questions`(

   question_number int(11) not null PRIMARY KEY  , 
   question_text text not null 

);";

$table2 = $PDO->query($sql2);



?>