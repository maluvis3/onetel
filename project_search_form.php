<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/community.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/media.css">
    <style media="screen">
    .msg_search_result {
        display: block !important;
    }
    </style>
</head>

<body>
    <div class="wrap">

        <?php include "include/sub_header.php" ?>

        <div class="sub_img">
            <img src="images/community_img.jpg" alt="">
            <div class="img_slogan">
                <h2>Give Us!!</h2>
                <p>Your Valuable Opinions.</p>
            </div>
        </div>

        <section class="community_section">
            <div class="contents_center">
                <div class="sub_page_title">
                    <h2>Project Search Results</h2>
                </div>

                <ul class="admin_project_box">
                    <li class="project_title clear">
                        <span class="col1">번호</span>
                        <span class="col2">제목</span>
                        <span class="col3">사진</span>
                        <span class="col4">설명</span>
                        <span class="col5">코드</span>
                        <span class="col6">언어</span>
                        <span class="col7">가격</span>
                        <span class="col8">수정</span>
                        <span class="col9">삭제</span>
                    </li>
                    <?php
                    $project_search_select = $_POST['project_search_select'];
                    $project_search_input = $_POST['project_search_input'];

                    //echo $project_search_select;
                    //echo $project_search_input;

                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");

                    if ($project_search_select == "title") {
                        $sql = "select * from project where title LIKE '%$project_search_input%' order by num desc";
                    } else if ($project_search_select == "text") {
                        $sql = "select * from project where text LIKE '%$project_search_input%' order by num desc";
                    } else {
                        $sql = "select * from project where code LIKE '%$project_search_input%' order by num desc";
                    }

                    $result = mysqli_query($con, $sql);
                    $num_row = mysqli_num_rows($result);

                    if (!$num_row) {
                        echo '<span style="padding:15px 0; width:100%; text-align:center; font-size:14px;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</span>';
                    } else {

                        while ($row = mysqli_fetch_array($result)) {
                            $num = $row['num'];
                            $title = $row['title'];
                            $image = $row['image'];
                            $text = $row['text'];
                            $code = $row['code'];
                            $lan = $row['lan'];
                            $price = $row['price'];
                    ?>
                    <form action="php/project_delete.php?num=<?= $num ?>" method="post">
                        <li class="project_list clear">

                            <span class="col1"><?= $num ?></span>
                            <span class="col2"><input type="text" value="<?= $title ?>" name="title"></span>
                            <span class="col3"><img src="images/<?= $image ?>" alt=""></span>
                            <span class="col4"><textarea name="text"><?= $text ?></textarea></span>
                            <span class="col5"><input type="text" value="<?= $code ?>" name="code"></span>
                            <span class="col6"><input type="text" value="<?= $lan ?>" name="lan"></span>
                            <span class="col7"><input type="text" value="<?= $price ?>" name="price"></span>
                            <span class="col8"><input type="submit" value="수정"
                                    formaction='php/project_update.php?num=<?= $num ?>'></span>
                            <span class="col9"><input type="submit" value="삭제"></span>

                        </li>
                    </form>

                    <?php
                        }
                    }
                    ?>

                </ul>

                <div class="write_btn clear" style="width:80%; margin:auto; padding-right:0;">
                    <a href="admin_form.php" class="board_btn">돌아가기</a>
                </div>
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script>

    </script>
</body>

</html>













<!-- --- -->