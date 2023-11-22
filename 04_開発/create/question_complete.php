<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>問題登録完了</title>
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
    <?php
            $sql = "INSERT INTO quiz(question, choices1, choices2, choices3, choices4, answer, expl, quiz_title, private) VALUES(?,?,?,?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $_POST['question'], PDO::PARAM_STR);
            $ps->bindValue(2, $_POST['choice1'], PDO::PARAM_STR);
            $ps->bindValue(3, $_POST['choice2'], PDO::PARAM_STR);
            $ps->bindValue(4, $_POST['choice3'], PDO::PARAM_STR);
            $ps->bindValue(5, $_POST['choice4'], PDO::PARAM_STR);
            $ps->bindValue(6, $_POST['answer'], PDO::PARAM_STR);
            $ps->bindValue(7, $_POST['expl'], PDO::PARAM_STR);
            $ps->bindValue(8, $_POST['title'], PDO::PARAM_STR);
            $ps->bindValue(9, 1, PDO::PARAM_INT);
            $ps->execute();


            $selectSql = "SELECT question_id FROM quiz WHERE question = ?";
            $selectps = $pdo->prepare($selectSql);
            $selectps->bindValue(1, $_POST['question'], PDO::PARAM_STR);
            $selectps->execute();

            foreach($selectps -> fetchAll() as $row){
                $insertSql = "INSERT INTO quizcategorys(question_id, category_id) VALUES(?,?)";
                $insertps = $pdo->prepare($insertSql);
                $insertps->bindValue(1, $row['question_id'], PDO::PARAM_INT);
                $insertps->bindValue(2, $_POST['category'], PDO::PARAM_INT);
                $insertps->execute();
            } 
        ?>
        <div class="text-center md-3">
            <h2 class="mt-5">問題の登録申請を行いました。</h2>
            <button class="mt-5 btn btn-primary" onclick="location.href='./question_create.php'">問題登録へ</button>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
