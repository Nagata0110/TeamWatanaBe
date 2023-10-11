<?php
//DB接続確認
try{
    $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
     echo "接続成功";
 }catch(Exception $e){
     echo "接続失敗";
 }
?>