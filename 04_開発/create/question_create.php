<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>問題作成画面</title>
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
?>
<form action="./question_confirm.php" method="post">
    <div class="title mt-4 ms-4 me-4">
        <label for="title" class="title"><h5>タイトル</h5></label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="タイトルを入力してください。" name="title">
    </div>
        <div class="title mt-4 ms-4 me-4">
            <label for="exampleFormControlTextarea1" class="form-label"><h5>問題文</h5></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"  style="resize: none;" placeholder="問題文を入力してください。(800字以内で)" name="question"></textarea>
        </div>
        
        <label for="radioButton" class="mt-5 ms-4 me-4">選択肢１</label>
        <div class="container ms-4 me-4">
            <input type="radio" id="choices" name="answer" class="radio-button" value="1">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="choice1">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢２</label>
        <div class="container ms-4 me-4">
            <input type="radio" id="choices" name="answer" class="radio-button" value="2">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="choice2">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢３</label>
        <div class="container ms-4 me-4">
            <input type="radio" id="choices" name="answer" class="radio-button" value="3">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="choice3">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢４</label>
        <div class="container ms-4 me-4">
            <input type="radio" id="choices" name="answer" class="radio-button" value="4">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="choice4">
        </div>
        <p class="mt-2 ms-4 me-4 error">※答えをラジオボタンで選択してください。</p>

        <div class="title mt-2 ms-4 me-4">
            <label for="exampleFormControlTextarea1" class="form-label">カテゴリー</label>
            <select class="form-select" aria-label="Default select example" name="category">
                <option selected>カテゴリーを選択してください。</option>
                <?php
                    $sql = "SELECT * FROM categorys";
                    $ps = $pdo -> prepare($sql);
                    $ps -> execute();
                    foreach($ps -> fetchAll() as $row){
                ?>
                    
                    <option  value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
                    
                <?php
                    }
                ?>
                
            </select>
        </div>

        

        <div class="title mt-4 ms-4 me-4">
            <label for="exampleFormControlTextarea1" class="form-label"><h5>解説</h5></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;" placeholder="解説を入力してください。(800字以内で)" name="expl"></textarea>
        </div>

        <div class="title mt-4 ms-4 me-4">
            <button class="btn btn-secondary offset-1 col-4">戻る</button>
            <button class="btn btn-primary offset-2 col-4" type="submit">確認</button>
        </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>