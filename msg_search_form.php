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
                    <h2>Messages Recieved</h2>
                </div>

                <div class="panel_box">
                    <div class="panel msg_panel msg_search_result">

                        <ul class="msg_list_box">
                            <li class="msg_list title clear">
                                <span class="list1">번호</span>
                                <span class="list2">이름</span>
                                <span class="list3">이메일</span>
                                <span class="list4">내용</span>
                                <span class="list5">작성시간</span>
                            </li>

                            <?php
                            $msg_select = $_POST['msg_search_select'];
                            $msg_input = $_POST['msg_search_input'];

                            $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");

                            if ($msg_select == 'name') {
                                $sql = "select * from msg_table where name LIKE '%$msg_input%' order by num desc";
                            } else {
                                $sql = "select * from msg_table where message LIKE '%$msg_input%' order by num desc";
                            }

                            $result = mysqli_query($con, $sql);
                            $num_row = mysqli_num_rows($result);

                            if (!$num_row) {
                                echo '<span style="padding:15px 0; width:100%; text-align:center; font-size:14px;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</span>';
                            } else {

                                while ($row = mysqli_fetch_array($result)) {
                                    $num = $row['num'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $message = $row['message'];
                                    $regist_day = $row['regist_day'];
                            ?>

                            <li class="msg_list list_content clear">
                                <span class="list1"><?= $num ?></span>
                                <span class="list2"><?= $name ?></span>
                                <span class="list3"><?= $email ?></span>
                                <span class="list4">
                                    <p><?= $message ?></p>
                                    <b><i class="fa fa-angle-down"></i></b>
                                </span>
                                <span class="list5"><?= $regist_day ?></span>
                                <span class="list6"><b
                                        onclick="location.href='php/admin_msg_delete.php?num=<?= $num ?>'">삭제</b></span>
                                <span class="list7"><?= $message ?></span>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                    </div>
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