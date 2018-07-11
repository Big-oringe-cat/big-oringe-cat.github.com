<?php
    if(isset($_POST["hash"])){
        $hash = md5($_COOKIE['cookie']);
        if($_POST["hash"]==$hash){
            $str1=$_SERVER["HTTP_REFERER"];
            $str2='~192.168.80.112:9444~';
            if(preg_match($str2,$str1)!=0){
                echo "<br>";
                echo $_POST["hash"];
                echo "<br>";
                echo $_REQUEST["name"];
                echo "<br>";
                echo $_REQUEST["password"];
                echo "<br>";
            }
        } else{
            echo "not safe";
        }
    } else{
        echo "no check";
    }
?>
