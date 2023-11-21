<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>カテゴリー細分化画面</title>
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
                        <a class="nav-link active" aria-current="page" href="../home/home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../create/question_create.php">問題作成</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="category subdivision">
        <?php
            $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
            $sql = "SELECT * FROM quiz AS q INNER JOIN quizcategorys AS qc ON q.question_id = qc.question_id WHERE qc.category_id = ? ";
            $ps = $pdo -> prepare($sql);
            $ps -> execute([$_REQUEST['id']]);
            foreach($ps -> fetchAll() as $row){
                $id = $row['question_id'];
        ?>
        <form action="../problem/problem.php?id=<?php echo $id ?>" method="post">
            <div class="button  mt-2 ms-4 me-4">
                <?php
                
                ?>
                <?php if($row['private'] === 0){ ?>
                    <button type="submit" class="btn btn-secondary mt-3 col-12" value="<?php echo $row['quiz_title'] ?>" name="title"><?php echo $row['quiz_title']?></button>
                <?php
                }
                ?>
            </div>
        </form>
        <?php
            }
        ?>
    </div>

    <div class="title mt-5 ms-4 me-4">
        <form action="../home/home.php" method="get">
            <button class="btn btn-primary offset-2 col-8" type="submit">戻る</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>