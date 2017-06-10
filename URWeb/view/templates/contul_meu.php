<?php
include_once("../../controller/get_users_information.php");
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
            <p style="position: center;">Informatiile contului sunt gata pentru actualizare, <?php echo $prenume; ?>!</p>
        </span>
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nume"> Nume: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nume" placeholder="First Name" name="nume" value="<?php echo $nume ?>">
                </div>

            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-sm-2" for="prenume"> Prenume: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenume" placeholder="Second Name" name="prenume" value="<?php echo $prenume ?>">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email"> Email: </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email ?>">
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
    </body>
</html>