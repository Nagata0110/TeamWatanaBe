<?php
    session_start();
    $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
    $sql = "SELECT * FROM admin WHERE admin_mail  = ? AND admin_pass = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $_POST['mail'], PDO::PARAM_STR);
    $ps->bindValue(2, $_POST['pass'], PDO::PARAM_STR);
    $ps->execute();
    $searchArray = $ps->fetchAll();

    foreach($searchArray as  $row){
        $_SESSION['mail'] = $row['admin_mail'];
        $_SESSION['id'] = $row['admin_id'];
        header('Location:admin_home.php');
    }

    if(count($searchArray)==0){
        //$_SESSION['msg'] = "ユーザーIDまたはパスワードが間違っています";
        header('Location:admin_login.php');
    }

?>