<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>問題画面</title>
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
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$_POST['id'],PDO::PARAM_INT);
        $ps -> execute();
        foreach($ps -> fetchAll() as $row){
    ?>
    <div class="title ms-4 me-4">
        <?php
            if($row['answer'] == $_POST['choices']){
        ?>
        <h2 class="mt-4 text-center text-info">正解です</h2>
        <?php
            }else{
        ?>
        <h2 class="mt-4 text-center error">不正解です</h2>
        <?php
            }
        ?>
        
        <p class="mt-4 statement">貴方の解答： <?php echo $_POST['choices'] ?></p>
        <p class="statement text-danger">正解： <?php echo $row['answer'] ?></p>
        <h5 class="text-primary">解説</h5>
        <p><?php echo $row['expl'] ?></p>
    </div>
            <div class="title mt-4 ms-4 me-4">
                <button class="btn btn-secondary offset-1 col-4">ホームへ</button>
                <button class="btn btn-primary offset-2 col-4">次へ</button>
            </div>
    <?php
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>