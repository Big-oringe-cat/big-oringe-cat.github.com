<?php
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    setcookie($_COOKIE, NULL);
    header("Location: test6.php"); 
}
if (isset($_COOKIE['cookie'])){
echo 'you have login';
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
