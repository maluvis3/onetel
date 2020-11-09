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
                    <h2>Community Search Results</h2>
                </div>

                <div class="board_panel board_table" style="width:80%">
                    <ul class="board_list_box" id="board_list">
                        <li class="board_list title clear">
                            <span class="check">선택</span>
                            <span class="num">번호</span>
                            <span class="tit">제목</span>
                            <span class="id">아이디</span>
                            <span class="hit">조회수</span>
                        </li>

                        <form action="php/community_delete.php" method="post" name="community_delete">

                            <?php
                            $selected = $_GET['key'];

                            $search_select = $_POST['community_search_select'];
                            $search_txt = $_POST['community_search_input'];

                            $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");

                            if ($search_select == 'id') {
                                $sql = "select * from community_board where id LIKE '%$search_txt%' order by num desc";
                            } else {
                                $sql = "select * from community_board where title LIKE '%$search_txt%' order by num desc";
                            }

                            $result = mysqli_query($con, $sql);
                            $num_row = mysqli_num_rows($result);

                            if (!$num_row || !$selected) {
                                echo '<span style="padding:15px 0; width:100%; text-align:center; font-size:14px;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</span>';
                            } else {

                                while ($row = mysqli_fetch_array($result)) {
                                    $num = $row['num'];
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $hits = $row['hits'];
                            ?>
                            <li class="board_contents board_list clear">
                                <span class="check"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
                                <span class="num"><?= $num ?></span>
                                <span class="tit"><a href="board_view.php?num=<?= $num ?>"
                                        id="txt_len"><?= $title ?></a></span>
                                <span class="id"><?= $id ?></span>
                                <span class="hit"><?= $hits ?></span>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </form>
                    </ul>
                    <a href="#" class="board_btn" onclick="delete_form()">선택삭제</a>
                </div>
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script>
    function delete_form() {
        document.community_delete.submit();
    }
    </script>
</body>

</html>













<!-- --- -->