<?php 
$hash = isset($_COOKIE["cookie"])? md5($_COOKIE["cookie"]): null;
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div>
<form action="test3.php" method="post">
账号: <input type="text" id="name" name="name"><br>
密码: <input type="text" id="password" name="password"><br>
<input type="hidden" name="hash" value="<?php echo $hash;?>"><br>
<input type="hidden" name="action" value="submitted">

<button type="submit" onclick="copyText()">复制文本</button>
</form>
</div>
<script src="js/md5.js"></script>
<script type="text/javascript">
function copyText(){
document.getElementById("name").value=hex_md5(document.getElementById("name").value);
document.getElementById("password").value=hex_md5(document.getElementById("password").value);
}
</script>

</body>
</html>
