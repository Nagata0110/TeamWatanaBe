<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>管理者側：問題詳細画面</title>
</head>
<body>
    <?php
         session_start();
         if(isset($_SESSION['mail']) == false || isset($_SESSION['id']) == false){
             header('Location:admin_login.php');
         }
    ?>
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
                        <a class="nav-link active" aria-current="page" href="./admin_home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./question_list.php">申請一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./admin_category.php">カテゴリー登録</a>
                    </li>
                    </ul>
                    <!-- 検索フォーム -->
                    <div class="d-flex">
                        <p>管理者：<span><?php echo $_SESSION['mail'] ?><br><a href="./admin_logout.php" class="">ログアウト</a></span></p>
                        
                    <!-- <input class="form-control me-2" type="search" placeholder="検索" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button> -->
                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
    <?php
    $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
    $sql = "SELECT * FROM quiz AS q 
            INNER JOIN quizcategorys AS qc ON q.question_id = qc.question_id 
            INNER JOIN categorys AS c ON qc.category_id = c.category_id 
            WHERE q.question_id = ?";
    // AND categorys AS c INNER JOIN c.categorys_id = qc.categorys_id 
    $ps = $pdo -> prepare($sql);
    $ps -> execute([$_REQUEST['id']]);
    $ps -> execute();
    foreach($ps -> fetchAll() as $row){
    ?>   

    <input type="hidden" value="<?php echo $row['question_id']?>" name="id">

    <div class="title mt-4 ms-4 me-4">
        <label for="title"><h5>タイトル</h5></label><br>
        <b><?php echo $row['quiz_title'] ?></b>
    </div>
    <div class="title mt-4 ms-4 me-4">
        <label for="questionText" class="form-label"><h5>問題文</h5></label><br>
        <b><?php echo $row['question'] ?></b>
    </div>

    <label for="radioButton" class="mt-5 ms-4 me-4">選択肢１</label>
        <div class="container ms-3 me-3"> 
            <b><?php echo $row['choices1'] ?></b>
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢２</label>
        <div class="container ms-3 me-3">
            <b><?php echo $row['choices2'] ?></b>
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢３</label>
        <div class="container ms-3 me-3">
            <b><?php echo $row['choices3'] ?></b>
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢４</label><br>
        <div class="container ms-3 me-3">
            <b><?php echo $row['choices4'] ?></b>
        </div>

        <label for="radioButton" class="mt-3 ms-4 me-4">正解</label><br>
        <div class="container ms-3 me-3">
            <b><?php echo $row['answer'] ?></b>
        </div>

    <div class="title mt-3 ms-4 me-4">
        <label for="categorySelect" class="form-label">カテゴリー</label><br>
        <b><?php echo $row['category']?><b>
    </div>

    <div class="title mt-4 ms-4 me-4">
        <label for="explanation" class="form-label"><h5>解説</h5></label><br>
        <b><?php echo $row['expl'] ?><b>
    </div>

    <div class="title mt-4 ms-4 me-4 mb-4">
        <button type="button" class="btn btn-secondary offset-4 col-4" onclick="location.href='./registration_list.php'">戻る</button>
    </div>
    <?php
         }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
