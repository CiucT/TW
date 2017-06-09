<?php
function getInfoUsers(){
    //creaza conexiune la baza de date
  $conn=conexiune_mysql();
    //preluam username  din sesiune
  $utilizatorCurent=$_SESSION["id"];

  $stmt =  mysqli_prepare($conn, "SELECT FIRST_NAME,LAST_NAME,E_MAIL,PROFILE_PIC from FACEBOOK_USERS WHERE ID=?");
  mysqli_stmt_bind_param($stmt,'s',$utilizatorCurent);
  $stmt->execute();
  $stmt->bind_result($nume,$prenume,$email,$profile_pic);
  $stmt->fetch();
  mysqli_stmt_free_result($stmt);
  mysqli_close($conn);
print '<script>
$(function(){
$("#nume").val("'.$nume.'");
  });
</script>'; 
print '<script>
$(function(){
$("#nume").val("'.$nume.'");
  });
</script>'; 
print '<script>
$(function(){
  $("#prenume").val("'.$prenume.'");
});
</script>';
print '<script>
$(function(){
  $("#email").val("'.$email.'");
});
</script>';

}

function modifica(){
    //daca s-a apasat butonul pt salvare modificari
  if(isset($_POST['aplica_modificari'])){
    //creaza conexiune la baza de date
    $conn=conexiune_mysql();
    //preia username-ul utilizatorului curent
    $utilizatorCurent=$_SESSION["id"];
    //preluam datele din campuri
    $nume=$_POST['nume'];
    $prenume=$_POST['prenume'];
    $data_nastere=$_POST['data_nastere'];
    $email=$_POST['email'];
    //salveaza modiifcarile in baza de date
    $stmt =  mysqli_prepare($conn, "UPDATE FACEBOOK_USERS SET FIRST_NAME=?, LAST_NAME=?, DATA_NASTERE=?, E_MAIL=? WHERE ID=?");
    //BIND parametri din operatia catre baza de date
    mysqli_stmt_bind_param($stmt,'ssss',$nume,$prenume,$data_nastere,$email);
    $stmt->execute();
    mysqli_stmt_free_result($stmt);
    mysqli_close($conn);
    print '<script>$(function() {
      $("#succes_info").show();
    });</script>';


  }
}
?>
<?php
include_once("URWeb/controller/fb_date.php");
?>
<!DOCTYPE HTML>
<html lang="en">
    <HEAD>
        <TITLE>
        </TITLE>

        <meta charset="utf-8">
        <!-- import CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <!-- import JS -->
        <script src="bootstrap-3.3.7/js/tests/vendor/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
    </HEAD>

    <BODY>
        <form id = "Modificare_formular" class="form-horizontal" role="form" method="POST">
         <span style="position: center;">
            <img src="<?php echo $profile_pic ?>">
            <p style="position: center;">Informatiile contului sunt gata pentru actualizare, <?php echo $first_name; ?>!</p>
        </span>
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nume"> Nume: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nume" placeholder="First Name" name="nume">
                </div>

            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="prenume"> Prenume: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenume" placeholder="Second Name" name="prenume">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="data_nastere"> Data nasterii: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="data_nastere" placeholder="yyyy-mm-dd" name="data_nastere"> 
                </div>
            </div>
            <hr>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email"> Email: </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
            </div>

            <hr>  
            <div id= "inregistrare" class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <div id="succes_info" hidden><p><img src="multimedia/green.svg" width="35px" height="35px" />Informatiile au fost actualizate cu succes!</p> </div>
                    <button type="submit" id="aplica_modificari" name="aplica_modificari" class="btn btn-default"> Salveaza </button>

                </div>
            </div>
            <hr>
        </form>

        <?php
        modifica();
        getInfoUsers();
        ?>
    </BODY>
</HTML>