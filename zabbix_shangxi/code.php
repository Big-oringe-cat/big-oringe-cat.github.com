<?php
$pass = getRequest('pass', '');
echo $pass;
echo "<br>";
$encode_pass = base64_encode($pass);
echo $encode_pass;
echo "<br>";
$decode_pass = base64_decode($encode_pass);
echo $decode_pass;
echo "<br>";
echo var_dump($pass == $decode_pass);
?>
