<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>問題作成確認画面</title>
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
                            <a class="nav-link active" aria-current="page" href="./question_create.php">問題作成</a>
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
    <form action="./question_complete.php" method="post">
    <div class="title mt-4 ms-4 me-4">
        <label for="title"><h5>タイトル</h5></label><br>
        <h3><?php echo $_POST['title'] ?></h3>
        <input type="hidden" name="title" value="<?php echo $_POST['title'] ?>">
    </div>

    <div class="title mt-4 ms-4 me-4">
        <label for="questionText" class="form-label"><h5>問題文</h5></label><br>
        <h4><?php echo $_POST['question'] ?></h4>
        <input type="hidden" name="question" value="<?php echo $_POST['question'] ?>">
    </div>

    <label for="radioButton" class="mt-5 ms-4 me-4">選択肢１</label>
        <div class="container ms-3 me-3"> 
        <h5><?php echo $_POST['choice1'] ?></h5>
        <input type="hidden" name="choice1" value="<?php echo $_POST['choice1'] ?>">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢２</label>
        <div class="container ms-3 me-3">
        <h5><?php echo $_POST['choice2'] ?></h5>
        <input type="hidden" name="choice2" value="<?php echo $_POST['choice2'] ?>">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢３</label>
        <div class="container ms-3 me-3">
        <h5><?php echo $_POST['choice3'] ?></h5>
        <input type="hidden" name="choice3" value="<?php echo $_POST['choice3'] ?>">
        </div>

        <label for="radioButton" class="ms-4 me-4">選択肢４</label><br>
        <div class="container ms-3 me-3">
        <h5><?php echo $_POST['choice4'] ?></h5>
        <input type="hidden" name="choice4" value="<?php echo $_POST['choice4'] ?>">
        </div>

        <label for="radioButton" class="mt-3 ms-4 me-4">正解</label><br>
        <div class="container ms-3 me-3">
            <?php
                
                switch($_POST['answer']){
                    case 1;
                    echo "<h5>".$_POST['choice1']."</h5>";
                    ?>
                    <input type="hidden"  value="<?php echo $_POST['choice1'] ?>" name="answer">
                    <?php
                    break;
                    case 2;
                    echo "<h5>".$_POST['choice2']."</h5>";
                    ?>
                    <input type="hidden"  value="<?php echo $_POST['choice2'] ?>" name="answer">
                    <?php
                    break;
                    case 3;
                    echo "<h5>".$_POST['choice3']."</h5>";
                    ?>
                    <input type="hidden"  value="<?php echo $_POST['choice3'] ?>" name="answer">
                    <?php
                    break;
                    case 4;
                    echo "<h5>".$_POST['choice4']."</h5>";
                    ?>
                    <input type="hidden"  value="<?php echo $_POST['choice4'] ?>" name="answer">
                    <?php
                    break;
                }
            ?>
        </div>

    <div class="title mt-3 ms-4 me-4">
        <?php
            $sql = "SELECT * FROM categorys WHERE category = ?";
            $ps = $pdo -> prepare($sql);
            $ps -> bindValue(1,$_POST['category'],PDO::PARAM_STR);
            $ps -> execute();
            $searchArray = $ps -> fetchAll();
        ?>
        <label for="categorySelect" class="form-label">カテゴリー</label><br>
        <h5><?php echo $_POST['category'] ?></h5>
        <?php
            foreach($searchArray as $row){
        ?>
        <input type="hidden" name="category" value="<?php echo $row['category_id']?>">
        <?php
            }
        ?>
    </div>

    <div class="title mt-4 ms-4 me-4">
        <label for="explanation" class="form-label"><h5>解説</h5></label><br>
        <h5><?php echo $_POST['expl'] ?></h5>
        <input type="hidden" name="expl" value="<?php echo $_POST['expl'] ?>">
    </div>

    <div class="title mt-4 ms-4 me-4">
        <button type="button" class="btn btn-secondary offset-1 col-4" onclick="history.back()">修正</button>
        <button type="submit"class="btn btn-primary offset-2 col-4">登録</button>
    </div>
        </form>

    <!-- <script>
        function goBack() {
            // 戻るボタンの処理をここに追加
            window.history.back();
        }

        function confirmQuestion() {
            // 問題確認ボタンの処理をここに追加
            const title = document.getElementById('titleInput').value;
            const questionText = document.getElementById('questionText').value;
            const category = document.getElementById('categorySelect').value;
            const explanation = document.getElementById('explanation').value;
            const choices = [];
            
            // ラジオボタンの選択肢とテキストを取得
            for (let i = 1; i <= 4; i++) {
                const choiceInput = document.getElementById('choice' + i);
                const choiceText = document.getElementById('choice' + i + 'Text').value;
                
                if (choiceInput.checked && choiceText.trim() !== '') {
                    choices.push({ text: choiceText, isCorrect: true });
                } else if (choiceText.trim() !== '') {
                    choices.push({ text: choiceText, isCorrect: false });
                }
            }
        }
    </script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
