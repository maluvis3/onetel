<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/community.css">
    <link rel="stylesheet" href="css/media.css">
    <style>

    </style>
</head>

<body>
    <div class="wrap">

        <?php include "include/sub_header.php" ?>

        <?php
        $num = $_GET["num"];

        $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
        $sql = "select * from community_board where num=$num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $id = $row["id"];
        $title = $row["title"];
        $content = $row["content"];
        $hits = $row["hits"];

        $content = str_replace(" ", "&nbsp", $content);
        $content = str_replace("\n", "<br>", $content);

        $new_hit = $hits + 1;
        $sql = "update community_board set hits=$new_hit where num=$num";
        mysqli_query($con, $sql);
        ?>

        <div class="sub_img">
            <img src="images/community_img.jpg" alt="">
            <div class="img_slogan">
                <h2>Give Us!!</h2>
                <p>Your Valuable Opinions.</p>
            </div>
        </div>

        <section class="community_section padding_fit">
            <div class="contents_center">
                <div class="sub_page_title">
                    <h2>Community</h2>
                </div>

                <div class="board_table">

                    <div class="write_box">
                        <form action="php/write_insert.php" method="post" name="write_form">
                            <p class="clear">
                                <label for="id">아이디</label>
                                <input type="text" id="id" value="<?= $id ?>" name="id" readonly>
                            </p>
                            <p class="clear">
                                <label for="title">제목</label>
                                <input type="text" id="title" name="title" value="<?= $title ?> [조회 : <?= $new_hit ?>]"
                                    readonly>
                            </p>
                            <p class="clear">
                                <!-- <label for="contents">내용</label> -->
                                <em class="view_content"><?= $content ?></em>
                            </p>
                        </form>
                    </div>
                    <div class="write_btn clear">
                        <a href="community.php" class="board_btn">돌아가기</a>

                        <?php
                        if ($userlevel != 1) {
                            echo "<input type='hidden'>";
                        } else {
                            echo '<a href="reply_form.php?num=' . $num . '" class="board_btn">답글달기</a>';
                        }
                        ?>

                    </div>
                </div><!-- end of board table tag -->
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>

    </script>
</body>

</html>













<!-- --- -->