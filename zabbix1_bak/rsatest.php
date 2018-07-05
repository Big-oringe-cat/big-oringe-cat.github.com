<?php
/**
 * Author: Wei ZhiHua
 * Date: 2017/6/30 0030
 * Time: 上午 10:15
 */
header('Content-Type:text/html;Charset=utf-8;');
include "rsa.php";
echo '<pre>';

$rsa = new RSA();
echo "公钥：\n", $rsa->pubKey, "\n";
echo "私钥：\n", $rsa->priKey, "\n";

// 使用公钥加密
$str = $rsa->publicEncrypt('admin', $rsa->pubKey);
echo $str,"\n";
$str = base64_encode($str);
echo $str,"\n";
$str = base64_decode($str);
$privstr = $rsa->privateDecrypt($str, $rsa->priKey);
echo "私钥解密：\n", $privstr, "\n";
$pubstr = $rsa->publicDecrypt($str, $rsa->pubKey);
echo "公钥解密：\n", $pubstr, "\n";




?>
