<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
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
$pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
$sql = "SELECT * FROM quiz ORDER BY RAND()";
$ps = $pdo->prepare($sql);
$ps->execute();
$cnt = 0;
foreach($ps -> fetchAll() as $row){
    if($cnt == 0){
        ?>
        <div class="title mt-4 ms-4 me-4">
            <h5>問題</h5>
            <p class="statement"><?php echo nl2br ($row['question']) ?></p>
        </div>
        <div class="button mt-5 ms-4 me-4">
            <!-- action=./answer.php -->
            <form action="./rand_answer.php" method="post">
                <input type="hidden" value="<?php echo $row['question_id'] ?>" name="id">
                <button type="submit" class="btn btn-secondary col-12" name="choices" value="<?php echo $row['choices1'] ?>"><?php echo $row['choices1'] ?></button>
                <button type="submit" class="btn btn-secondary col-12 mt-3" name="choices" value="<?php echo $row['choices2'] ?>"><?php echo $row['choices2'] ?></button>
                <button type="submit" class="btn btn-secondary col-12 mt-3" name="choices" value="<?php echo $row['choices3'] ?>"><?php echo $row['choices3'] ?></button>
                <button type="submit" class="btn btn-secondary col-12 mt-3" name="choices" value="<?php echo $row['choices4'] ?>"><?php echo $row['choices4'] ?></button>
            </form>
        </div>
        <?php
        $cnt++;
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>