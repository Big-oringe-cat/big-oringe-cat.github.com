<?php 
$hash = isset($_COOKIE["cookie"])? md5($_COOKIE["cookie"]): null;
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div>
<form action="aesform.php" method="post">
账号: <input type="text" id="name" name="name"><br>
密码: <input type="text" id="password" name="password"><br>
<input type="hidden" name="hash" value="<?php echo $hash;?>"><br>
<input type="hidden" name="action" value="submitted">

<button type="submit" onclick="copyText()">复制文本</button>
</form>
</div>
<script src="js/md5.js"></script>
<script src="js/aes.js"></script>
<script src="js/pad-zeropadding.js"></script>
<script type="text/javascript">
function copyText(){
var key  = CryptoJS.enc.Latin1.parse('666666');//密钥
var iv   = CryptoJS.enc.Latin1.parse('666666');//与密钥保持一致
var name =  JSON.stringify(document.getElementById("name").value);
var pass =  JSON.stringify(document.getElementById("password").value);

document.getElementById("name").value=encodeURIComponent(CryptoJS.AES.encrypt(name,key,{iv:iv,mode:CryptoJS.mode.CBC,padding:CryptoJS.pad.ZeroPadding}));
document.getElementById("password").value=encodeURIComponent(CryptoJS.AES.encrypt(pass,key,{iv:iv,mode:CryptoJS.mode.CBC,padding:CryptoJS.pad.ZeroPadding}));
}
</script>

</body>
</html>
