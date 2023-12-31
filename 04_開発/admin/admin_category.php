<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>カテゴリー登録</title>
</head>
<body>
<?php
        session_start();
        if(isset($_SESSION['mail']) == false || isset($_SESSION['id']) == false){
            header('Location:admin_login.php');
        }
    ?>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-center" href="#">社会人ビジネスマナークイズ</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./admin_home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./question_list.php">申請一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./admin_category.php">カテゴリー登録</a>
                    </li>
                    </ul>
                    <div class="d-flex">
                        <p>管理者：<span><?php echo $_SESSION['mail'] ?><br><a href="./admin_logout.php" class="">ログアウト</a></span></p>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <h2 class="mt-4 ms-4 me-4">カテゴリー登録</h2>
    <div class="mb-3 mt-5 ms-5 me-5">
        <form action="./category_complete.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="exampleInputEmail1" class="form-label">カテゴリー名</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mt-4">
                <input type="file" name="upfile" id="upfile" accept="image/jpg, image/jpeg, image/png" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5 col-4 offset-4">登録</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>