<?php           //start session
$_SESSION = array();    //clear session array
session_destroy();      //destroy session
header( 'Location: http://localhost/Tw/index.php' ) ;
?>
<!--
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="=0;URL=http://localhost/Tw/index.php" />
<title>Log Out</title>
</head>

<body>
<p>You have successfully logged out!</p>
<p>Return to the <a href="http://localhost/TW">Home</a> page</p>

</body>
</html>
-->
