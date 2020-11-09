<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/project_detail.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="wrap">

        <?php include "include/sub_header.php" ?>

        <div class="sub_img">
            <img src="images/portfolio-img8.jpg" alt="">
            <div class="img_slogan">
                <h2>Experience!!</h2>
                <p>All Kind of Creative Technologies.</p>
            </div>
        </div>

        <section class="detail_section">
            <div class="center">

                <?php

                $num = $_GET["num"];

                $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                $sql = "select * from project where num=$num";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["image"];
                    $title = $row["title"];
                    $text = $row["text"];
                    $code = $row["code"];
                    $lan = $row["lan"];
                    $price = $row["price"];

                ?>

                <div class="sub_page_title">
                    <h2><?= $title ?></h2>
                </div>
                <div class="detail_box clear">
                    <div class="detail_image">
                        <img src="images/<?= $image ?>" alt="">
                    </div>
                    <div class="detail_contents">
                        <div class="detail_title">
                            <h3><?= $title ?></h3>
                        </div>
                        <div class="text_contents clear">
                            <div class="text_left">
                                <p>CODE NO.</p>
                                <p>Project Languiges</p>
                                <p>Project Info</p>
                            </div>
                            <div class="text_right">
                                <p><?= $code ?></p>
                                <p><?= $lan ?></p>
                                <p><?= $text ?></p>
                            </div>
                        </div>
                        <div class="price clear">
                            <div class="price_left">
                                <p>Price</p>
                            </div>
                            <div class="price_right">
                                <p>￦<?= $price ?></p>
                            </div>
                        </div>
                        <div class="detail_btns clear">
                            <a href="#">BUY IT NOW</a>
                            <a href="#">ADD TO CART</a>
                            <a href="#">WISH LIST</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>













<!-- --- -->