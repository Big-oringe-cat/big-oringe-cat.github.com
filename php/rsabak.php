<?php
$captcha = isset($_POST["captcha"])?$_POST["captcha"]:null;
class Jm {
public static function login($login1, $password1){
//私钥
$private_key = "-----BEGIN RSA PRIVATE KEY-----
MIICXgIBAAKBgQCl/qy1u6mSXLY4z7RaqNRjSz5IuuitNOLPESyaQTAqbUpJ14Lh
qrfiR4rTDJaog4ruYDo+mGu8ReYx9tkV+4kD25azZmGUDWNbShd1so+fo8m79OL0
FkHIR3XZWhVS80lVoypAz3N3M8L/IrwA7iZ626+FYiiX8jFDvxWfISKDHQIDAQAB
AoGAUuj3nvYS5pYENjAYZ0f4fXfxriYdXZYSy1ZKrulsg2R/PI62Qr0gh5cwUeXx
wk2hsRrDPMyo0ysepUokeARhFIxEqiEDBk4mWc+4b0561wX4QAHI0s7ux0yb2e7P
KSS0g1Vjrnz+Gw6X6nU4amw/wZ17VU8gVFhim0T7LY4O2IkCQQDPli9XvGf2idoq
uDquRHQiLMBgHXwuGYSHiQLaoH2cdwBHdTcUC/neZLkycg0K2n8culc7WkHea8t8
Ihanb6RPAkEAzLVHRyXfpDG8owm2PzKF9ATTNfqg14Sr1MwUtqlPX4FTw3qScl7m
9AZ4g3NLlULlmpmgQDHNjhQN04EI/V0K0wJBALikOIYMkliLM1/uMFvTjYzcS1zy
vQLwNZ6ssrouKKxkeP4Wd6BAKseyxbvmEE3IHWo7IN4tIQuqy/slAwt5VScCQQCz
zDzwtsk5VB4VLUCPPXb+HwbMEHgZE4RBAYbn8MmwXs0NkqjyH3zGtLBA9JFcZkd4
hJqGB7g9pEuIi3sz3fbVAkEAxPo4qlVLTNGdLc/fNDlg0+xXEtEs+4rf6mXVkFMe
dZapdkWXdq55oraWp+RFqus/h6Pt0Y0/GcqNJXcVVj4vow==
-----END RSA PRIVATE KEY-----";
$hex_encrypt_name = trim($login1);  //十六进制数据
$encrypt_name = pack("H*", $hex_encrypt_name); //对十六进制数据进行转换
openssl_private_decrypt($encrypt_name, $login, $private_key); //解密数据
$hex_encrypt_pass = trim($password1);  //十六进制数据
$encrypt_pass = pack("H*", $hex_encrypt_pass); //对十六进制数据进行转换
openssl_private_decrypt($encrypt_pass, $password, $private_key); //解密数据
echo "name:",$login;
echo "</br>";
echo "pass:",$password;
echo "</br>";
}
}
$a = new Jm();
$a->login($_POST['name'],$_POST['password']);
echo "</br>";
echo $_COOKIE["captcha"];
echo "</br>";
echo $captcha;
?>
