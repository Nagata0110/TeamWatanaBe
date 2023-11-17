<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="./img/OIG.4l.jpg">
    <title>ホーム画面</title>
</head>
<body>
    <!-- ヘッダー -->
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
                            <a class="nav-link active" aria-current="page" href="#">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">カテゴリー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">問題作成</a>
                        </li>
                    </ul>
                    <!-- 検索フォーム -->
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <?php
    $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
    $sql = "SELECT * FROM quiz WHERE question_id = ?";
    $sql = "SELECT * FROM categorys";
    $ps = $pdo -> prepare($sql);
    $ps -> execute();
    ?>

    <!-- 画像挿入 -->
   
        <div class="row mt-5">
            <?php 
                foreach ($ps -> fetchAll() as $row ) { 
                    $id = $row['category_id']
            ?>
            <div class="col-6 gx-5 gy-3">
                <div class="card">
                    <a href="../subdivision/subdivision.php?id=<?php echo $id ?>" class="link">
                        <img class="card-img-top" src="../img/<?php echo $row['category_img'] ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['category']; ?></h5>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>