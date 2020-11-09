<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <div class="wrap">

        <?php include "include/sub_header.php" ?>

        <?php
        if (!$userid || $userlevel != 1) {
            echo "<p style='text-align:center; width:100%; margin-top:150px;'>관리자 페이지 입니다. 권한이 있는 관리자만이 접근 가능합니다.</p>";
        } else {
        ?>

        <section class="admin_box">
            <div class="center">
                <div class="tab_box">
                    <button type="button" class="on">메시지 관리</button>
                    <button type="button">회원관리</button>
                    <button type="button">상품관리</button>
                    <button type="button">게시판 관리</button>
                </div>
                <div class="panel_box">
                    <div class="panel msg_panel">

                        <ul class="msg_list_box">
                            <li class="msg_list title clear">
                                <span class="list1">번호</span>
                                <span class="list2">이름</span>
                                <span class="list3">이메일</span>
                                <span class="list4">내용</span>
                                <span class="list5">작성시간</span>
                            </li>

                            <?php
                                $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                                $sql = "select * from msg_table order by num desc";
                                $result = mysqli_query($con, $sql);

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
                                ?>
                        </ul>

                        <form action="msg_search_form.php" name="msg_search" method="post" class="msg_search clear">
                            <div class="msg_search_box">
                                <select name="msg_search_select">
                                    <option value="name">이름</option>
                                    <option value="message">내용</option>
                                </select>
                                <input type="text" name="msg_search_input">
                                <b onclick="check_input()"><i class="fa fa-search"></i></b>
                            </div>
                        </form>

                    </div>
                    <div class="panel member_panel">
                        <div class="center">
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
                                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                                    $sql = "select * from members order by num desc limit 10";
                                    $result = mysqli_query($con, $sql);
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
                                    ?>
                            </ul>

                            <form action="member_search_form.php" name="member_search" method="post"
                                class="msg_search clear">
                                <div class="msg_search_box">
                                    <select name="member_search_select">
                                        <option value="id">아이디</option>
                                        <option value="name">이름</option>
                                    </select>
                                    <input type="text" name="member_search_input">
                                    <b onclick="member_check_input()"><i class="fa fa-search"></i></b>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="panel project_panel">
                        <div class="center">
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
                                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                                    $sql = "select * from project order by num desc limit 3";
                                    $result = mysqli_query($con, $sql);
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
                                    ?>

                            </ul>

                            <form action="project_search_form.php" name="project_search" method="post"
                                class="msg_search clear" style="width:80%; float:left;">
                                <div class="msg_search_box">
                                    <select name="project_search_select">
                                        <option value="title">제목</option>
                                        <option value="text">설명</option>
                                        <option value="code">코드</option>
                                    </select>
                                    <input type="text" name="project_search_input">
                                    <b onclick="project_check_input()"><i class="fa fa-search"></i></b>
                                </div>
                            </form>
                            <a href="project_input_form.php" class="board_btn">상품입력</a>
                        </div>
                    </div>
                    <div class="panel board_panel board_table">
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
                                    $con = mysqli_connect("localhost", "yoonseul3", "rlaalsrud11#", "yoonseul3");
                                    $sql = "select * from community_board order by num desc limit 6";
                                    $result = mysqli_query($con, $sql);

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
                                    ?>
                            </form>
                        </ul>

                        <form action="community_search_form.php?key=selected" name="community_search" method="post"
                            class="msg_search clear" style="width:80%; float:left;">
                            <div class="msg_search_box" style="width:80%;">
                                <select name="community_search_select" style="height:39px;">
                                    <option value="title">제목</option>
                                    <option value="id">아이디</option>
                                </select>
                                <input type="text" name="community_search_input" style="height:39px;">
                                <b onclick="community_check_input()" style="height:39px; padding:10px;"><i
                                        class="fa fa-search"></i></b>
                            </div>
                        </form>
                        <a href="#" class="board_btn" onclick="delete_form()">선택삭제</a>
                    </div>
                </div>
            </div>
        </section>

        <?php
        }
        ?>
        <?php include "include/footer.php" ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script>
    function check_input() {
        if (!document.msg_search.msg_search_input.value) {
            alert("검색어를 입력해 주세요..");
            document.msg_search.msg_search_input.focus();
            return;
        }

        document.msg_search.submit();
    }

    function member_check_input() {
        if (!document.member_search.member_search_input.value) {
            alert("검색어를 입력해 주세요..");
            document.member_search.member_search_input.focus();
            return;
        }

        document.member_search.submit();
    }

    function project_check_input() {
        if (!document.project_search.project_search_input.value) {
            alert("검색어를 입력해 주세요..");
            document.project_search.project_search_input.focus();
            return;
        }

        document.project_search.submit();
    }

    function community_check_input() {
        if (!document.community_search.community_search_input.value) {
            alert("검색어를 입력해 주세요..");
            document.community_search.community_search_input.focus();
            return;
        }

        document.community_search.submit();
    }

    function delete_form() {
        document.community_delete.submit();
    }
    </script>
</body>

</html>













<!-- --- -->