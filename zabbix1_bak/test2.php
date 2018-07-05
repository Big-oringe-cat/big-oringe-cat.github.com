<?php

header('Content-Type:text/html;Charset=utf-8;');
include "rsa.php";
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    setcookie($_COOKIE, NULL);
    header("Location: test6.php"); 
}
if (isset($_COOKIE['cookie'])){
$rsa = new RSA();
echo 'you have login','n';
$name = $_POST['name'];
$pass = $_POST['password'];
$name_1 = $rsa->privateDecrypt($name, $rsa->priKey);
$pass_1 = $rsa->privateDecrypt($pass, $rsa->priKey);
echo $name,'\n';
echo $name_1,'\n';
echo $pass,'\n';
echo $pass_1,'\n';
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="hidden" name="action" value="logout">
<button type="submit" >logout</button>
</form>
<?php
} else{
header("Location: test6.php"); 
echo "no check";
}
?>
