<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/OIG.4l.jpg">
    <title>カテゴリー登録完了</title>
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
        
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
            $file='../img/'.basename($_FILES['upfile']['name']);
            if (move_uploaded_file($_FILES['upfile']['tmp_name'], $file)) {
                $pdo = new PDO('mysql:host=mysql202.phy.lolipop.lan;dbname=LAA1418434-aaa;charset=utf8','LAA1418434', '090414');
                $sql = "INSERT INTO categorys(category, category_img) VALUES (?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $_POST['category'], PDO::PARAM_STR);
                $ps->bindValue(2, basename($_FILES['upfile']['name']), PDO::PARAM_STR); 
                $ps->execute();
    ?>
                <h2 class="text-center mt-5">カテゴリーが登録されました。</h2>
    <?php
            }else{
    ?>
                <h2 class="text-center mt-5">アップロードに失敗しました。</h2>
    <?php
            }
    ?>
    <?php
        }else{
    ?>
                 <h2 class="text-center mt-5">ファイルを選択してください。</h2>
    <?php
        }
    ?>
        <!--  -->
        <?php
        // } else {
        //     // アップロードに失敗した場合の処理
        //     ?>
            <!-- <h2 class="text-center mt-5">カテゴリーが登録されませんでした。</h2> -->
        <?php
        // }
        ?>
    <form action="./admin_category.php">
        <button class="offset-4 col-4 btn btn-secondary mt-4">カテゴリー登録へ</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
    </html>
        