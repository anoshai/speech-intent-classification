<?php
function db_connect() {
   #connect with database
   $mysqli = new mysqli('database-1.c3ccsukeeqvm.us-east-2.rds.amazonaws.com', 'admin', 'ikki1956', 'voice_data', 3306);
   if ($mysqli->connect_error) {
    die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
   }

   $mysqli->query("SET NAMES utf8");
   $mysqli->query("SET CHARACTER SET utf8");
   $mysqli->set_charset('utf8');

   return $mysqli;
}



// function db_connect(){
//    // $HOST='localhost:3306';
//    // $USER='anosha';
//    // $PASSWORD='ano@Ikki123';
//    // $DB='voice_data';
//    $HOST='localhost';
//    $USER='chanu';
//    $PASSWORD='Chanu21@';
//    $DB='voice_data';

//    // Create connection
//    $conn = new mysqli($HOST,$USER,$PASSWORD,$DB);
//    // Check connection
//    if ($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//    }
//    return $conn;
// }
?>
