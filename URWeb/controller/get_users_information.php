<?php
session_start();
include 'connect_mysql.php';
    //creaza conexiune la baza de date
  $conn=conexiune_mysql();
    //preluam username  din sesiune
  $utilizatorCurent=$_SESSION["id"];

  $stmt =  mysqli_prepare($conn, "SELECT FIRST_NAME,LAST_NAME,E_MAIL,PROFILE_PIC from FACEBOOK_USERS WHERE ID=?");
  mysqli_stmt_bind_param($stmt,'s',$utilizatorCurent);
  $stmt->execute();
  $stmt->bind_result($prenume,$nume,$email,$profile_pic);
  $stmt->fetch();
  mysqli_stmt_free_result($stmt);

  if(isset($_POST['aplica_modificari'])){
    //preluam datele din campuri
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $email=$_POST['email'];
    //salveaza modiifcarile in baza de date
    $stmt1 = "UPDATE FACEBOOK_USERS SET FIRST_NAME='".$prenume."', LAST_NAME='".$nume."', E_MAIL= '".$email."' WHERE ID='".$utilizatorCurent."'";
    mysqli_query($conn, $stmt1)or die(mysqli_error($conn));
 }
?>