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
    <?php
    // POSTリクエストを処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームからデータを取得
        $title = $_POST["title"];
        $questionText = $_POST["questionText"];
        $choice1 = $_POST["choice1"];
        $choice2 = $_POST["choice2"];
        $choice3 = $_POST["choice3"];
        $choice4 = $_POST["choice4"];
        $correctAnswer = $_POST["correctAnswer"];
        $category = $_POST["category"];
        $explanation = $_POST["explanation"];
    } 
    ?>

    <!-- ヘッダー -->
    <div class="sticky-top">
        <!-- ヘッダー部分はそのままです -->
    </div>

    <div class="title mt-4 ms-4 me-4">
        <label for="title"><h5>タイトル</h5></label><br>
        <?php echo $title; ?>
    </div>
    <div class="title mt-4 ms-4 me-4">
        <label for="questionText" class="form-label"><h5>問題文</h5></label><br>
        <?php echo $questionText; ?>
    </div>

    <label for="radioButton" class="mt-5 ms-4 me-4">選択肢１</label>
    <div class="container ms-3 me-3">
        <?php echo $choice1; ?>
    </div>

    <label for="radioButton" class="ms-4 me-4">選択肢２</label>
    <div class="container ms-3 me-3">
        <?php echo $choice2; ?>
    </div>

    <label for "radioButton" class="ms-4 me-4">選択肢３</label>
    <div class="container ms-3 me-3">
        <?php echo $choice3; ?>
    </div>

    <label for "radioButton" class="ms-4 me-4">選択肢４</label><br>
    <div class="container ms-3 me-3">
        <?php echo $choice4; ?>
    </div>

    <label for "radioButton" class="mt-3 ms-4 me-4">正解</label><br>
    <div class="container ms-3 me-3">
        <?php echo $correctAnswer; ?>
    </div>

    <div class="title mt-3 ms-4 me-4">
        <label for="categorySelect" class="form-label">カテゴリー</label><br>
        <?php echo $category; ?>
    </div>

    <div class="title mt-4 ms-4 me-4">
        <label for="explanation" class="form-label"><h5>解説</h5></label><br>
        <?php echo $explanation; ?>
    </div>

    <div class="title mt-4 ms-4 me-4">
        <button class="btn btn-secondary offset-1 col-4" onclick="goBack()">修正</button>
        <button class="btn btn-primary offset-2 col-4" onclick="confirmQuestion()">登録</button>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
