<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>管理者ログイン</title>
</head>
<body>

    <?php
        session_start();
        if(isset($_SESSION['mail']) == true && isset($_SESSION['id']) == true){
            header('Location:admin_home.php');
        }
    ?>

    <h3 class="mt-4 ms-4 me-4 text-center">管理者用<br>社会人ビジネスマナークイズ</h3>
    <form action="./admin_logincheck.php" method="post">
        <div class="title offset-4 col-4">
            <label for="title" class="title">メールアドレス</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="メールアドレスを入力してください。" name="mail" required>
        </div>

        <div class="title offset-4 col-4">
            <label for="pass" class="pass">パスワード</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="パスワードを入力してください。" name="pass" required>
        </div>

        <div class="title mt-5 ms-4 me-4">
            <button type="submit" class="btn btn-secondary offset-4 col-4">ログイン</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>