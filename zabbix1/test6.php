<?php
$value = "DefenseSCRF";
setcookie("cookie", $value, time()+3600);
$hash = isset($_COOKIE["cookie"])? md5($_COOKIE["cookie"]): null;
if (isset($_POST['hash']) && $_POST['hash'] == $hash){
    header("Location: test2.php"); 
} else{
?>
<body>
<iframe id="ifrID" src="test8.php">  
</iframe>
</body>
<?php
}
?>
