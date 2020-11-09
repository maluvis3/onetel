<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="wrap">

        <?php include "include/header.php" ?>

        <section class="msg_check">

            <?php
            $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
            $sql = "select * from msg_table order by num desc";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $num = $row["num"];
                $name = $row["name"];
                $email = $row["email"];
                $msg = $row["message"];
                $regist_day = $row["regist_day"];
            ?>

            <div class="msg_check_box">
                <p>순서 : <?= $num ?></p>
                <p>이름 : <?= $name ?></p>
                <p>이메일 : <?= $email ?></p>
                <p>메시지 : <?= $msg ?></p>
                <p>메시지 : <?= $regist_day ?></p>
            </div>

            <?php
            }
            ?>

        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>













<!-- --- -->