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
                    <h2>Member Search Results</h2>
                </div>

                <ul class="member_list">
                    <li class="list_title clear">
                        <span class="col1">번호</span>
                        <span class="col2">아이디</span>
                        <span class="col3">이름</span>
                        <span class="col4">레벨</span>
                        <span class="col5">포인트</span>
                        <span class="col6">가입일</span>
                        <span class="col7">수정</span>
                        <span class="col8">삭제</span>
                    </li>

                    <?php
                    $member_select = $_POST['member_search_select'];
                    $member_input = $_POST['member_search_input'];

                    //echo $id;
                    //echo $name;

                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");

                    if ($member_select == 'id') {
                        $sql = "select * from members where id LIKE '%$member_input%' order by num desc";
                    } else {
                        $sql = "select * from members where name LIKE '%$member_input%' order by num desc";
                    }

                    $result = mysqli_query($con, $sql);
                    $num_row = mysqli_num_rows($result);

                    if (!$num_row) {
                        echo '<span style="padding:15px 0; width:100%; text-align:center; font-size:14px;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</span>';
                    } else {

                        while ($row = mysqli_fetch_array($result)) {
                            $num = $row['num'];
                            $id = $row['id'];
                            $name = $row['name'];
                            $level = $row['level'];
                            $point = $row['point'];
                            $regist_day = substr($row['regist_day'], 0, 10);
                    ?>

                    <li class="list_content clear">
                        <form action="php/member_update.php?num=<?= $num ?>" method="post">
                            <span class="col1"><?= $num ?></span>
                            <span class="col2"><?= $id ?></span>
                            <span class="col3"><?= $name ?></span>
                            <span class="col4"><input type="text" name="level" value="<?= $level ?>"></span>
                            <span class="col5"><input type="text" name="point" value="<?= $point ?>"></span>
                            <span class="col6"><?= $regist_day ?></span>
                            <span class="col7"><button type="submit">수정</button></span>
                            <span class="col8"><button type="button"
                                    onclick="location.href='php/member_delete.php?num=<?= $num ?>'">삭제</button></span>
                        </form>
                    </li>
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